<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomer;
use App\Models\Customer;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class MemberController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    public function index(Request $request){

        try {
            $params = $request->all();
            $perPage = $request->input('itemsPerPage', 20);
            $query = Customer::search($request);
            $data = $query->paginate($perPage);

            $result = [
                'records' => $data,
                'params' => $params
            ];

            return $this->response(true, $result, __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

    public function delete(Request $request){

        try {
            if (isset($request->ids) && !empty($request->ids)) {
                $data = explode(',', $request->ids);
                if (!empty($data)) {
                    DB::table(Customer::getTableName())
                        ->whereIn('id', $data)
                        ->update(['is_deleted' => 1]);

                        Customer::whereIn('id', $data)->delete();
                }
            }
                        
            return $this->response(true, ['params' => $request->all()], __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

    public function save(StoreCustomer $request)
    {
        DB::beginTransaction();
        try {
            $params = $request->all();
            if (empty($request->id)) {
                $user = new Customer();
            } else {
                $user = Customer::find($request->id);
            }

            $user->fill($params);
            $user->type = Customer::TYPE_D;
            $user->is_deleted = 0;
            if (isset($request->password)) {
                $user->password = Hash::make($user->password);
            }
            $user->save();
            $data = [
                'user' => $user,
                'params' => $params
            ];

            DB::commit();
            return $this->response(true, $data, __('common.request.success'));

        } catch (\Exception $e) {
            DB::rollback();
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

    public function show(Request $request, $id)
    {

        try {
            $user = null;
            if ($id) {
                $tableName = Customer::getTableName();
                $user = Customer::select($tableName.'.*', $tableName . '.withdrawal_date AS withdrawaldate_ymdhi')
                    ->where($tableName.'.id' , $request->id)->first();
            }
            $data = [
                'user' => $user,
                'prefectures' => Prefecture::All(),
                'params' => $request->all(),
            ];

            return $this->response(true, $data, __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

}
