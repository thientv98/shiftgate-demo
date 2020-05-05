<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class MeController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    public function index(Request $request){
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function logout(){
        $this->auth->invalidate();
        return response()->json([
            'success' => true
        ]);
    }
}
