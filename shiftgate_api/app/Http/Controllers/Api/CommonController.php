<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class CommonController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    public function prefecture(Request $request){

        try {
            $data = Prefecture::All();
            $result = [
                'prefectures' => $data,
            ];

            return $this->response(true, $result, __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }


}
