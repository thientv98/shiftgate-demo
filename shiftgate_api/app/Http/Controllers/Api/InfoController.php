<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotice;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class InfoController extends Controller
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
            $tableName = Notice::getTableName();
            $data = Notice::select(
                        $tableName . '.id', 
                        $tableName . '.content',
                        $tableName . '.link_url', 
                        $tableName . '.published_date',
                        $tableName . '.published_date AS published_date_ymd'
                    )->orderBy($sortBy, $sortType)->paginate($perPage);
            
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
                    DB::table(Notice::getTableName())
                        ->whereIn('id', $data)
                        ->update(['deleted_at' => date('Y-m-d H:i:s')]);
                }
            }
                        
            return $this->response(true, ['params' => $request->all()], __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

    public function save(StoreNotice $request)
    {

        DB::beginTransaction();
        try {
            $params = $request->all();
            if (empty($request->id)) {
                $notice = new Notice();
            } else {
                $notice = Notice::find($request->id);
            }

            $notice->fill($params);
            $notice->save();
            $data = [
                'notice' => $notice,
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
            $notice = null;
            if ($id) {
                $notice = Notice::find($request->id);
            }
            $data = [
                'notice' => $notice,
                'params' => $request->all(),
            ];

            return $this->response(true, $data, __('common.request.success'));

        } catch (\Exception $e) {
            return $this->response(false, null, __('common.request.failed') . $e->getMessage());
        }
    }

}
