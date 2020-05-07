<?php

namespace App\Http\Controllers\ApiFront;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\File;
use App\Models\Maker;
use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use PDF;

class HomeController extends Controller
{
    public function getMakerList()
    {
        //$makerList = Maker::where('icon_image', '!=', '')->get();

        $makerList = [
            ['id' => 314, 'name' => 'メルセデスベンツ', 'icon_image' => 'brand_mercedes.png'],
            ['id' => 320, 'name' => 'ＢＭＷ', 'icon_image' => 'brand_bmw.png'],
            ['id' => 340, 'name' => 'アウディ', 'icon_image' => 'brand_audi.png'],
            ['id' => 350, 'name' => 'フォルクスワーゲン', 'icon_image' => 'brand_vw.png'],
            ['id' => 330, 'name' => 'ポルシェ', 'icon_image' => 'brand_porsche.png'],
            ['id' => 510, 'name' => 'フェラーリ', 'icon_image' => 'brand_ferrari.png'],
            ['id' => 560, 'name' => 'ランボルギーニ', 'icon_image' => 'brand_lamborghini.png'],
            ['id' => 540, 'name' => 'マセラティ', 'icon_image' => 'brand_maserati.png'],
            ['id' => 520, 'name' => 'アルファロメオ', 'icon_image' => 'brand_alfaromeo.png'],
            ['id' => 410, 'name' => 'ジャガー', 'icon_image' => 'brand_jaguar.png'],
            ['id' => 440, 'name' => 'アストンマーティン', 'icon_image' => 'brand_astonmartin.png'],
            ['id' => 420, 'name' => 'ローバー', 'icon_image' => 'brand_landrover.png'],
            ['id' => 430, 'name' => 'ベントレー', 'icon_image' => 'brand_bentley.png'],
            ['id' => 710, 'name' => 'ボルボ', 'icon_image' => 'brand_volvo.png'],
            ['id' => 231, 'name' => 'ジープ', 'icon_image' => 'brand_jeep.png'],
        ];

        return $this->response(true, $makerList, trans('common.request.success'));
    }

    public function getCarList()
    {
        $cars = Car::latest()->where('public_status_code', 201)->take(8)->get([
            'id', 'image1', 'is_in_contract', 'is_in_transaction', 'maker_name', 'grade_name',
            'car_name', 'model_year', 'mileage', 'inspection_date', 'total_price','first_registration_date'
        ]);

        return $this->response(true, $cars, trans('common.request.success'));

    }

    public function getCarFile($id){
        $estimate = File::where('car_id', $id)->where('type', 'estimate')->where('is_use_estimate', 1)->get();
        $contract_buyer = File::where('car_id', $id)->where('type', 'contract_buyer')->first();
        $contract_seller = File::where('car_id', $id)->where('type', 'contract_seller')->first();
        
        $data = [
            'estimate' => $estimate,
            'contract_buyer' => $contract_buyer,
            'contract_seller' => $contract_seller
        ];
        return $this->response(true, $data, trans('common.request.success'));
    }

    public function getNotice(){

        $notice = Notice::where('published_date', '<=', Carbon::now())->orderBy('published_date', 'desc')->get();
        return $this->response(true, $notice, trans('common.request.success'));
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function createPDF(Request $request)
    {
        // set certificate file
        // $certificate = 'file://'.base_path().'/public/tcpdf.crt';
        // set additional information in the signature
        // $info = array(
        //     'Name' => 'TCPDF',
        //     'Location' => 'Office',
        //     'Reason' => 'Testing TCPDF',
        //     'ContactInfo' => 'http://www.tcpdf.org',
        // );
        // dd($certificate);
        // set document signature
        // PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);
        
        PDF::SetFont('kozgopromedium', '', 13);
        PDF::AddPage();

        // print a line of text
        $text = view('tcpdf');

        // add view content
        PDF::writeHTML($text, true, 0, true, 0);
        
        $data = substr($request->image, strpos($request->image, ',') + 1);
        $data = str_replace(' ', '+', $data);
        $imgdata = base64_decode($data);

        
        PDF::Image('@'.$imgdata, 140, 60, 60, 40, 'PNG'); // Left, bottom, Width, Height

        // add image for signature
        // PDF::Image('tcpdf.png', 180, 60, 15, 15, 'PNG');
        
        // define active area for signature appearance
        PDF::setSignatureAppearance(180, 60, 15, 15);
        
        // dd(public_path('hello_world.pdf'));
        // save pdf file
        PDF::Output(public_path('seller.pdf'), 'F');
        PDF::reset();

        dd('pdf created');
    }

}
