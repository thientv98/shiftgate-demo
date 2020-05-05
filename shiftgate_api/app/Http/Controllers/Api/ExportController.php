<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateTradingConditionRequest;
use App\Models\File;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Car;
use App\Models\Status;
use App\Models\Maker;
use App\Models\Models;
use App\Exports\CarExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function car(Request $request)
    {
        $records = Car::search($request)
                ->with('customer', 'customerBuyer', 'status')->get();

        return Excel::download(new CarExport($records), 'cars_'.date('YmdHis').'.csv');
    }
}
