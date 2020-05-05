<?php

namespace App\Http\Controllers\ApiFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prefecture;

class CommonController extends Controller
{
    // implement common method

    public function getPrefecture($id){

        try{
            $prefecture = Prefecture::find($id);
            return $this->response(true, $prefecture, trans('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

    public function getPrefectureList(){
        try{
            $prefectures = Prefecture::all();
            return $this->response(true, $prefectures, trans('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }
}
