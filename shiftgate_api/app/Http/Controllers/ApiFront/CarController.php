<?php

namespace App\Http\Controllers\ApiFront;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\LandTransportationFee;
use Illuminate\Http\Request;
use Exception;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\DB;
use App\Models\Favorite;
use App\Models\BrowsingHistory;
use App\Models\Customer;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class CarController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->isJson()) return $this->response(false, null, 'Unauthorized',401);
        try {
            $car = new Car();

            $requestData = $request->all();
            $requestData['customer_id'] = $request->user()->id;

            for($i = 1; $i <= 25; $i++){
                if(!empty($requestData['image'.$i])){
                    $requestData['image'.$i] = 'data:image/jpg;base64,' . $requestData['image'.$i];
                }
            }

            $car->fill($requestData);
            $car->save();
            $car->update(['trading_no' => Car::formatTradingNumb($car->id)]);

            $arrImages = [];
            $arrImages['development_image'] = $requestData['development_image'];
            $arrImages['inspection_image'] = $requestData['inspection_image'];
            $arrImages['liability_insurance_image'] = $requestData['liability_insurance_image'];
            foreach ($arrImages as $index => $item){
                if(!empty($item)){
                    $file = $item;
                    $ext = 'jpg';
                    $image = base64_decode($file);
                    $file ='data:image/jpg;base64,' . $file;
                    $car->update([$index => $file]);
                    if($image_path = Storage::put('car/' . $car->id . '/' . $index . '.' . $ext, $image)){
                        File::create([
                            'image_path' => 'car/' . $car->id . '/' . $index . '.' . $ext,
                            'image_name' => $index . '.' . $ext,
                            'car_id' => $car->id,
                            'is_delete_ban' => 1
                        ]);
                    }
                }
            }
            $user = $request->user();
            $sendMail = env('MAIL_ADDRESS_CON');
            Mail::send(['text' => 'email.insert-car'], ['customer' => $user], function($message) use ($sendMail, $user) {
                $s = '出品通知 '.$user->last_name.$user->first_name.' 様 (ID: '.$user->type.sprintf('%08d', $user->id).')';
                $message->to($sendMail, "")->subject($s);
            });
            return $this->response(true, null, '車情報が正常に作成されました');
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    public function getCarByTableName($id, $tableName, $current_page = null)
    {
        $query = Customer::select('cars.id', 'cars.maker_name', 'cars.car_name', 'cars.image1' ,'cars.is_in_contract', 
                                'cars.model_year', 'cars.mileage', 'cars.engine_displacement', 'cars.inspection_date', 
                                'cars.total_price', 'cars.is_in_transaction', 'cars.is_in_contract', 'cars.is_car_delivery_complete', 
                                'cars.is_trading_complete', 'cars.buyer_id', 'cars.first_registration_date', DB::raw('prefectures.name as prefectures'))
                        ->where('customers.id',$id)
                        ->where('cars.public_status_code',201)
                        ->whereNull($tableName.'.deleted_at')
                        ->join($tableName, 'customers.id', '=', $tableName.'.customer_id')
                        ->join('cars', $tableName.'.car_id', '=', 'cars.id')
                        ->join('prefectures', 'prefectures.id', '=', 'customers.prefecture_id')
                        ->distinct('cars.id');

        if($tableName == 'favorite')
            $query = $query->addSelect(DB::raw($tableName.'.created_at'.' as table_created_at'))
                        ->orderBy('table_created_at', 'desc');
        if($tableName == 'browsing_histories')
            $query = $query->addSelect( DB::raw($tableName.'.updated_at'.' as table_updated_at'))
                        ->orderBy('table_updated_at', 'desc');

        return $query->paginate(10, ['*'], 'page', $current_page);
    }

    public function getCarBuySell($id, $tableName, $current_page = null)
    {
        $query = Customer::select('cars.id', 'cars.maker_name', 'cars.car_name', 'cars.image1' ,'cars.is_in_contract', 'cars.trading_no',
                                'cars.model_year', 'cars.mileage', 'cars.engine_displacement', 'cars.inspection_date', 
                                'cars.total_price', 'cars.is_in_transaction', 'cars.is_in_contract', 'cars.is_car_delivery_complete', 
                                'cars.is_trading_complete', 'cars.buyer_id', 'cars.first_registration_date', DB::raw('prefectures.name as prefectures'))
                        ->where('customers.id',$id)
                        ->join('cars', 'customers.id', '=', 'cars.'.$tableName)
                        ->join('prefectures', 'prefectures.id', '=', 'customers.prefecture_id');
        if($tableName =='buyer_id') {
            $query = $query->whereIn('cars.public_status_code', [201, 301]);
        }
        return $query->orderBy('cars.created_at', 'desc')
                    ->paginate(10, ['*'], 'page', $current_page);
    }

    /**
     * Get all car in your favorite
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function favoriteCarId(Request $request)
    {
        $user = $request->user();
        $result = [];

        if($user) {
            foreach ($user->favorites as $value) {
                array_push($result, $value->car);
            }
        }

        return $this->response(true, $result, trans('common.request.success'));
    }

    /**
     * Get cars base on flag
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getCarsByFlag(Request $request)
    {
        $user = $request->user();
        $result = [];

        if($user) {
            if($request->flag == 'favorite') {
                $result = $this->getCarByTableName($user->id, 'favorites', $request->current_page);
            }
            if($request->flag == 'history') {
                $result = $this->getCarByTableName($user->id, 'browsing_histories', $request->current_page);
            }
            if($request->flag == 'estimate') {
                $result = $this->getCarBuySell($user->id, 'buyer_id', $request->current_page);
            }
            if($request->flag == 'selling-car') {
                $result = $this->getCarBuySell($user->id, 'customer_id', $request->current_page);
            }
        }

        if($request->flag == 'search') {
            $result = Car::select('cars.id', 'cars.maker_name', 'cars.car_name', 'cars.image1' ,'cars.is_in_contract', 'cars.grade_name',
                                'cars.model_year', 'cars.mileage', 'cars.engine_displacement', 'cars.inspection_date', 
                                'cars.total_price', 'cars.is_in_transaction', 'cars.is_in_contract', 'cars.is_car_delivery_complete', 
                                'cars.is_trading_complete', 'cars.buyer_id', 'cars.first_registration_date', DB::raw('prefectures.name as prefectures'))
                        ->where('cars.public_status_code',201)
                        ->join('customers', 'customers.id', '=', 'cars.customer_id')
                        ->join('prefectures', 'prefectures.id', '=', 'customers.prefecture_id');

            if($request->text_search)
                $result = $result->where(function($q) use($request) {
                    $q->where('car_name','like','%'. $request->text_search .'%')
                    ->orWhere('maker_name','like','%'. $request->text_search .'%');
                });

            if($request->sort_by_id) {
                $result->orderBy('cars.id', $request->sort_by_id);
            }

            if($request->sort_by_first_registration_date) {
                $result->orderBy('first_registration_date', $request->sort_by_first_registration_date);
            }

            if($request->sort_by_mileage) {
                $result->orderBy('cars.mileage', $request->sort_by_mileage);
            }

            if(!$request->sort_by_id && !$request->sort_by_model_year && !$request->sort_by_mileage) {
                $result = $result->orderBy('cars.created_at', 'desc');
            }

            $result = $result->paginate(10, ['*'], 'page', $request->current_page);
        }

        return $this->response(true, $result, trans('common.request.success'));
    }

    /**
     * Add favorite
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateFavorite(Request $request)
    {
        $findFavorite = Favorite::where('customer_id', $request->user()->id)->where('car_id',$request->idCar);
        $findTrashed = Favorite::onlyTrashed()->where('customer_id', $request->user()->id)->where('car_id',$request->idCar);
        
        if(!$findTrashed->get()->isEmpty()) {
            $findTrashed->restore();
        }
        elseif(!$findFavorite->get()->isEmpty()) {
            $favorite = $findFavorite->delete();
        }
        else {
            $favorite = Favorite::create([
                'customer_id' => $request->user()->id,
                'car_id' => $request->idCar
            ]);
        }
        
        return $this->response(true, null, trans('common.request.success'));
    }

    public function carDetail(Request $request, $id)
    {
        $landTransportationFee = null;
        $carDetail = Car::find($id);
        $carFavorite = $request->user() ? Favorite::where('customer_id', $request->user()->id)
                ->where('car_id', $request->id)->first() : null;

        if($request->user() && $id) {
            $history = BrowsingHistory::where('customer_id', $request->user()->id)
                        ->where('car_id', $id)
                        ->first();
            if(empty($history)) {
                $history = new BrowsingHistory();
                $history->customer_id = $request->user()->id;
                $history->car_id = $id;
            } 
            $history->updated_at = date('Y-m-d H:i:s');
            $history->save();     
            
            $landTransportationFee = LandTransportationFee::where('from_prefecture_id', $carDetail->customer->prefecture_id)
                        ->where('to_prefecture_id', $request->user()->prefecture_id)->first();
        }

        $data = [
            'car' => $carDetail,
            'carInfos' => (object) [
                            'engine_fuel_code' => Car::engine_fuel_code($carDetail->engine_fuel_code),
                            'transmission_type_code' => Car::transmission_type_code($carDetail->transmission_type_code),
                            'drive_shaft_code' => Car::drive_shaft_code($carDetail->drive_shaft_code),
                            'steering_place_code' => Car::steering_place_code($carDetail->steering_place_code),
                            'color_category_code' => Car::color_category_code($carDetail->color_category_code),
                            'recycle_ticket_code' => Car::recycle_ticket_code($carDetail->recycle_ticket_code),
                        ],
            'prefecture' => $carDetail->customer->prefecture,
            'customer' => $carDetail->customer,
            'landTransportationFee' => $landTransportationFee,
            'userPrefecture' => $request->user() ? $request->user()->prefecture : null,
            'carFavorite' => $carFavorite,
        ];
        return $this->response(true, $data, trans('common.request.success'));
    }
    
    public function update(Request $request, $id)
    {
        try {
            $requestData = $request->all();
            if($id) {
                $car = Car::find($id);
                $landTransportationFee = LandTransportationFee::where('from_prefecture_id', $car->customer->prefecture_id)
                        ->where('to_prefecture_id', $request->user()->prefecture_id)->first();
                $car->fill($requestData);
                $car->transport_fee = $landTransportationFee->fee;
                $car->save();

                $user = $request->user();
                $sendMail = env('MAIL_ADDRESS_CON');
                Mail::send(['text' => 'email.request-estimate'], ['customer' => $user], function($message) use ($sendMail, $user) {
                    $s = '見積もり依頼 '.$user->last_name.$user->first_name.' 様 (ID: '.$user->type.sprintf('%08d', $user->id).')';
                    $message->to($sendMail, "")->subject($s);
                });
            }
            return $this->response(true, null, '車情報が正常に作成されました');
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    public function updateCarConsent(Request $request){
        try {
            $car = Car::where('id', $request->id)->update([$request->col => $request->val]);
            return $this->response(true, null, trans('common.request.success'));
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }
}
