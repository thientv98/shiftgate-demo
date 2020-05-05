<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class UserController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    public function index(Request $request){

        try {
            $params = $request->all();
            $perPage = $request->input('itemsPerPage', 20);
            $sortBy = $request->sortBy ? $request->sortBy : 'id';
            $sortType = $request->sortDesc == 'true' ? 'desc' : 'asc';
            $query = User::select(
                        User::getTableName().'.*',
                        DB::raw('CONCAT(last_name, " ", first_name) AS full_name')
                )->where('is_deleted', 0);

            if($sortBy == 'last_name') {
                $query->orderBy('full_name', $sortType);
            } else {
                $query->orderBy($sortBy, $sortType);
            }
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
                    DB::table(User::getTableName())
                        ->whereIn('id', $data)
                        ->update(['is_deleted' => 1]);

                    User::whereIn('id', $data)
                        ->delete();
                }
            }
                        
            return $this->response(true, ['params' => $request->all()], __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

    public function save(StoreUser $request)
    {

        DB::beginTransaction();
        try {
            $params = $request->all();
            if (empty($request->id)) {
                $user = new User();
            } else {
                $user = User::find($request->id);
            }

            $user->fill($params);
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
                $user = User::find($request->id);
            }
            $data = [
                'user' => $user,
                'params' => $request->all(),
            ];

            return $this->response(true, $data, __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

}
