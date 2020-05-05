<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Exception;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Display a listing of contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $car_id)
    {
        $sortBy = ($request->sortBy && $request->sortBy != 'actions') ? $request->sortBy : 'id';
        $sortDesc = ($request->sortDesc == 'false' || !$request->sortDesc) ? 'asc' : 'desc';
        $contacts = Contact::join('admins', 'admins.id', 'contacts.admin_id')
            ->select('contacts.*', 'admins.first_name', 'admins.last_name', DB::raw('CONCAT(admins.last_name, " ", admins.first_name) as contact_name'))
            ->where('contacts.car_id', $car_id)
            ->orderBy($sortBy, $sortDesc)
            ->paginate($request->itemsPerPage)
            ->toArray();

        return $this->response(true, ['contacts' => $contacts], trans('common.request.success'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreContactRequest $request)
    {
        try {
            $request->validated();
            $requestData = $request->all();
            Contact::create($requestData);
            return $this->response(true, null, '保存しました', 200);
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    /**
     * get contact info by $id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactInfo($id)
    {
        try {
            $contact = Contact::where('id', $id)->first();
            return $this->response(true, ['contact_info' => $contact], '連絡先情報を正常に取得する', 200);
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    /**
     * update contact info
     * @param $id
     * @param StoreContactRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateContact($id, StoreContactRequest $request)
    {
        try {
            $contact = Contact::where('id', $id)->first();
            $request->validated();
            $requestData = $request->all();

            $contact->update($requestData);
            return $this->response(true, null, '保存しました', 200);
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    /**
     * Delete contact
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($car_id, Request $request)
    {
        try {
            $ids = explode(',', $request->ids);
            Contact::where('car_id', $car_id)->whereIn('id', $ids)->delete();
            return $this->response(true, null, '連絡先は正常に削除されました', 200);
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }
}
