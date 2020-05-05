<?php

namespace App\Http\Controllers\ApiFront;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Requests\GMORequest;
use App\Models\Car;
use App\Models\Customer;

class SignatureController extends Controller
{
    protected $client;
    protected $urlGmo = 'https://api.gmo-agree.com/agree-api/v0/api/';
    protected $secretKey;
    protected $cusId;

    public function __construct(Client $client){
        $this->client = $client;
        $this->secretKey = env('GMO_SECRET_KEY', 'AGRsEcs9lQvaVjyOq6esMSuttXy82OYUaqig2bdNRb');
        $this->cusId = env('GMO_CUS_ID', 'IA013602052');
    }

    /**
    * Create token password reset
    *
     * @param  Request $request
     * @param  [string] car_id
     * @param  [string] type
    * @return [json] file object
    */
    public function index(Request $request) {


        $validator = \Validator::make($request->all(), [
            'car_id' => 'required',
            'file_type' => 'required',
            'signature' => 'required',
        ]);

        if ($validator->fails()) {
            //pass validator errors as errors object for ajax response
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $params = $request->all();
        $image = str_replace('data:image/png;base64,', '', $params["signature"]);
        $image = base64_decode($image);
        if(Storage::put('car/' . $params["car_id"] . '/temp-signature/' . "signature" . '.' . "png", $image)){
            return $this->response(true, null, 'Saved signature');
        }
        return $this->response(false, null, 'Saved FAIL');

        // binding params
        $car = Car::findOrFail($params['car_id']);
        $partner_signing = Customer::findOrFail($request['partner_signing_id']);
        $record = File::where(['car_id' => $params['car_id'], 'type' => $params['file_type']])->firstOrFail();

        // Step 1
        if(!$access_token = $this->tokenGeneration()){
            return $this->response(false, null, 'Access Token Not Get');
        }


        // Step 2
        if(!$xid = $this->getTransaction($access_token)){
            return $this->response(false, null, 'Xid Not Get');
        }

        $authorization = [
            "access_token" => $access_token,
            "secret_key" => $this->secretKey,
            "cus_id" => $this->cusId,
            "xid" => $xid,
            "download_type" => 1
        ];

        // Step 3
        if(!$documentRegister = $this->documentRegister($access_token, $xid, $record)){
            return $this->response(false, null, 'Document register fail');
        };

        // Step 4
        $registerInfo = $this->documentRegisterInfo($authorization, $car->car_name);

        // Step 5
        if(!$documentToken = $this->documentRegisterPosition($authorization, $partner_signing, $params)){
            return $this->response(false, null, 'Can not get document token');
        }

        // Step 6
        if(!$signet = $this->documentSignet($authorization, $documentToken)){
            return $this->response(false, null, 'Signet Fail');
        }

        //Step 7
        if(!$documentStatus =$this->documentStatus($authorization)){
            return $this->response(false, null, 'Invalid document status');
        }

        //Step 8
        if(!$documentGet = $this->documentGet($authorization, $record)){
            return $this->response(false, null, 'Unable to overwrite');
        }

        return $this->response(true, array_merge($params, ['record' => $record]), trans('Success'));
    }

    public function postGmo($url, $params){
        try {
            $response = $this->client->request('POST', $this->urlGmo . $url, [
                'body' => json_encode($params),
                'headers' => [
                    'Content-Type'     => 'application/json',
                ]
            ]);
            return json_decode($response->getBody());
        } catch (RequestException $e) {
            return Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                return Psr7\str($e->getResponse());
            }
        }
    }

    // Step 1
    public function tokenGeneration(){
        $response = $this->postGmo('accesstoken/generate', [
            "secret_key" => $this->secretKey,
            "cus_id" => $this->cusId,
        ]);
        return $response->status == 0 ? $response->result->access_token : '';
    }

    // Step 2
    public function getTransaction($token){
        $response = $this->postGmo('transaction/get', [
            'secret_key' => $this->secretKey,
            'cus_id' => $this->cusId,
            'access_token' => $token
        ]);

        return $response->status == 0 ? $response->result->xid : '';
    }

    // Step 3
    public function convertFileToBase64($pathFile = 'car/100/test.xlsx'){
        $contents = Storage::get($pathFile);
        return base64_encode($contents);
    }

    public function documentRegister($token, $xid, $record){
        $documentBase64 = $this->convertFileToBase64($record->image_path);

        $response = $this->postGmo('document/register', [
            'secret_key' => $this->secretKey,
            'cus_id' => $this->cusId,
            'access_token' => $token,
            'xid' => $xid,
            'document' => $documentBase64
        ]);

        return $response->status == '0';
    }

    // Step 4
    public function documentRegisterInfo($authorization, $car_name){
        return $this->postGmo('document/registerInfo', array_merge($authorization, [
            "document_name" => "車両ID:$car_name",
            "name_nm" => "SHIFT-GATE",
            "document_type" => "3",
            "is_workflow_show" => "2"
        ]));
    }

    // Step 5
    public function documentRegisterPosition($authorization, $partner_signing, $params){
        $response = $this->postGmo('document/registerPosition', array_merge($authorization, [
            "is_signing_field" => "1",
            "partner_signing_field" => [[
                "comment" => "",
                "email" => $partner_signing->email,
                "is_request_sign" => "1",
                "is_send_mail" => "2",
                "document_type" => "3",
                "organize_nm" => $partner_signing->last_name. " " .$partner_signing->first_name. " 様",
                "signing_point_start_x" => "68",
                "signing_point_start_y" => "75",
                "signing_point_end_x" => "75",
                "signing_point_end_y" => "82",
                "page_no" => "1",
                "order_no" => "1"
            ]]
        ]));

        if($response->status == 0){
            return $response->result->partner_document_token[0]->document_token;
        }

        return false;
    }

    // Step 6
    public function documentSignet($authorization, $documentToken){
        $response = $this->postGmo('document/signet', array_merge($authorization, [
            "document_token" => $documentToken,
            "sign_image" => "1",
            "sign_style" => "1"
        ]));

        return ($response->status == 0) ? true :false;
    }

    // Step 7
    public function documentStatus($authorization){
        $loop = 1;
        while($loop <= 10)
        {
            $response = $this->postGmo('document/status', $authorization);

            if($response->status == 0 && $response->result->document_status == 99){
                return $response->result->document_status;
            }

            $loop++;
            sleep(1);
        }
        return false;
    }

    // Step 8
    public function documentGet($authorization, $record){

        $response = $this->postGmo('document/get', $authorization);

        if($response->status != 0) {
            return false;
        }

        $base64 = ($response->result->documents_data);

        @list($type, $file_data) = explode(';', $base64);
        @list(, $file_data) = explode(',', $file_data); 
        $file_data = base64_decode($file_data);

        if(Storage::put($record->image_path , $file_data)){
            File::where('id', $record->id)->update([
                'image_path' => $record->image_path,
                'is_signature_contract' => 1,
                'signature_date' => Carbon::now(),
                $record->type == 'contract_seller' ? 'gmo_buyer_xid' : 'gmo_seller_xid' => $authorization['xid']
            ]);

            //return Storage::url($record->image_path);
        }
        return true;
    }

}
