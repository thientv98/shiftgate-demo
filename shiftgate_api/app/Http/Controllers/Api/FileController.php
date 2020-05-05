<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\Models\File;
use Exception;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class FileController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Display a listing of file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileList(Request $request, $car_id)
    {
        $sortBy = ($request->sortBy && $request->sortBy != 'actions') ? $request->sortBy : 'created_at';
        $sortDesc = ($request->sortDesc == 'false' || !$request->sortDesc) ? 'desc' : 'asc';
        $fileLists = File::where('car_id', $car_id)
            ->orderBy($sortBy, $sortDesc)
            ->paginate($request->itemsPerPage)
            ->toArray();

        return $this->response(true, ['file_lists' => $fileLists], trans('common.request.success'));
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(StoreFileRequest $request)
    {
        try {
            if ($request->hasFile('file')) {
                $request->validated();
                $file = $request->file('file');
                
                $ext = $file->getClientOriginalExtension();
                $fileNameWithoutExt = explode('.', $file->getClientOriginalName())[0];

                if($image_path = Storage::put('car/' . $request->car_id, $file)){
                    if($request->file_id != 'null') {
                        File::where('id', $request->file_id)->update([
                            'image_path' => $image_path,
                            'image_name' => $fileNameWithoutExt . '.' . $ext,
                        ]);
                    }
                    else {
                        File::create([
                            'image_path' => $image_path,
                            'image_name' => $fileNameWithoutExt . '.' . $ext,
                            'car_id' => $request->car_id,
                            'is_delete_ban' => 0,
                            'type' => $request->type
                        ]);
                    }
                }
            }
            return $this->response(true, $request->file_id, 'ファイルが正常にアップロードされました', 200);
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    /**
     * Delete file
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteFile(Request $request)
    {
        DB::beginTransaction();
        try {
            $ids = explode(',', $request->ids);
            $files = File::whereIn('id', $ids)->get();
            foreach ($files as $file) {
                if($file->is_delete_ban) {
                    DB::rollBack();
                    return $this->response(false, null, '選択したファイルには削除できないファイルが含まれています。もう一度やり直してください', 500);
                } else {
                    $file->delete();
                    if (Storage::disk('public')->exists('\\app\\' . $file->image_name)) {
                        Storage::disk('public')->delete('\\app\\' . $file->image_name);
                    }
                }
            }
            DB::commit();
            return $this->response(true, null, 'ファイルは正常に削除されました', 200);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    public function uploadEstimate(Request $request, $id)
    {
        try {
            // Open transaction
            DB::beginTransaction();
            //

            $file = File::find($id);
            if ($file->is_use_estimate == 1) 
                $file->is_use_estimate = 0;
            else $file->is_use_estimate = 1;
            $file->save();

            // Commit transaction
            DB::commit();
            //
            return $this->response(true, $file, '保存しました', 200);
        } catch (Exception $e) {
            // Rollback transaction
            DB::rollBack();
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }
}
