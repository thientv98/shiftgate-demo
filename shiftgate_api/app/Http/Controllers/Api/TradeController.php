<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateTradingConditionRequest;
use App\Models\Contact;
use App\Models\File;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Car;
use App\Models\Status;
use App\Models\Maker;
use App\Models\Models;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Customer;

class TradeController extends Controller
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
    public function index(Request $request)
    {
        $first_page = null;
        if ($request->firstPage == "true") {
            $first_page = 1;
        }
        $records = Car::search($request)->paginate($request->itemsPerPage, ['*'], 'page', $first_page)->toArray();

        $makers = Maker::all();
        foreach($makers as $item){
            $item['value'] = $item->name;
        }

        $models = Models::all();
        foreach($models as $item){
            $item['value'] = $item->name;
        }

        $status_code = Status::all();

        return response()->json([
            'success' => true,
            'data' => [
                'records' => $records,
                'makers' => $makers,
                'models' => $models,
                'status_code' => $status_code,
                'masterData' => $this->getMasterData()
            ]
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'success' => true,
            'data' => $this->getMasterData()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fileList = File::where('car_id', $id)->latest()->get();
        $carDetail = Car::with('contacts.admin')->find($id);
        $contactData = Contact::where('car_id', $id)->latest()->take(5)->get();
        $data = [
            'detail' => $carDetail,
            'sellerData' => $carDetail->customer,
            'buyerData' => $carDetail->customerBuyer,
            'fileList' => $fileList,
            'contactData' => $contactData
        ];
        return $this->response(true, $data, trans('common.request.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $question->statusName = $question->status['name'];
        $question->userName = $question->user['last_name'] . ' ' . $question->user['first_name'];

        $data = [
            'detail_question' => $question
        ];
        return response()->json([
            'success' => true,
            'data' => array_merge($this->getMasterData(), $data)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // Find Car in DB
        $car = Car::find($id);
        $params = $request->all();
        
        if ($car instanceof Car) {
            try {
                // Open transaction
                DB::beginTransaction();
                //

                $mess = null;
                // if total price of car is null ~> don't change status code 201
                if ($car->total_price == null && $request->public_status_code == 201) {
                    unset($params['public_status_code']);
                    $mess = trans("The status of the car don't change because total price = 0");
                }
                
                for ($i=1; $i <= 25; $i++) { 
                    $item = 'image'.$i;
                    if ($request->hasFile($item)) {
                        // image compression
                        $image = $request->file($item);
                        $img = Image::make($image->getRealPath());
                        // $img->resize(500, 500, function ($constraint) {
                        //     $constraint->aspectRatio();
                        // });
                        $params[$item] = (string)$img->encode('data-url');
                    }
                }

                // Query Update
                $result = $car->update($params);

                // update total vehicle price
                $this->sumTotalVehiclePrice($car);

                // Commit transaction
                DB::commit();
                //
                return $this->response(true, $car, $mess ?? trans('保存しました'));
            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollBack();

                return $this->response(false, null, $e->getMessage(), 400);
            }
        }

        return $this->response(false, null, trans('Car Not Found!'), 404);

    }

    /**
     * Delete the specified resource from storage.
     *  $ids
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            Car::whereIn('id', $request->ids)->delete();
            return $this->response(true, null, 'These cars deleted successfully', 200);
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    /**
     * Get master data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMasterData()
    {
        return [
        ];
    }

    /**
     * Get all status
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllStatus()
    {
        return $this->response(true, Status::all(), trans('common.request.success'));
    }

    /** Update status for trade
     * @return \Illuminate\Http\Response
     *
     * @param Request $request
     */
    public function updateStatus(Request $request)
    {
        try {
            $car = Car::where('id', $request->id)->first();

            $car->update([
                $request->field => $request->value
            ]);

            if ($car->is_in_transaction == 0) {
                $car->update([
                    'buyer_id' => null,
                    'transport_fee' => null,
                    'is_seller_consent' => 0,
                    'is_buyer_consent' => 0,
                    'buyer_introduction_code' => null
                ]);
            }

            return $this->response(true, null, 'ステータスが正常に更新されました', 200);

        } catch (Exception $e) {
            return $this->response(true, null, $e->getMessage(), 500);
        }
    }

    /**
     * update trading condition info
     * @return \Illuminate\Http\Response
     *
     * @param UpdateTradingConditionRequest $request
     */
    public function updateTradingCondition(UpdateTradingConditionRequest $request)
    {
        try {
            $request->validated();
            Car::where('id', $request->id)->update($request->all());
            return $this->response(true, null, '保存しました', 200);
        } catch (Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    /**
     * Sum total vehicle price
     */
    public function sumTotalVehiclePrice(Car $car)
    {
        $sum = $car->total_price;
        if ($car->is_coating) $sum += $car->coating_fee;
        if ($car->is_film) $sum += $car->film_fee;
        if ($car->is_warranty_inheritance) $sum += $car->warranty_inheritance_fee;
        if ($car->is_electric_components) $sum += $car->electric_components_fee;
        if ($car->is_shift_gate_warranty) $sum += $car->shift_gate_warranty_fee;
        if ($car->is_other) $sum += $car->other_fee;
        $sum += $car->transport_fee + $car->acquisition_tax;
        $car->total_vehicle_price = $sum;
        $car->save();
        return $car;
    }

    /**
     * Delete list images of car.
     * @param  int $id
     * @param  array $listImage
     * @return \Illuminate\Http\Response
     */
    public function deleteCarImage(Request $request)
    {
        // Find Car in DB
        $car = Car::find($request->id);
        $listImage = [];

        if ($car instanceof Car) {
            try {
                // Open transaction
                DB::beginTransaction();
                //

                // Update Image
                if($request->listImage) {
                    $listImage = explode(',', $request->listImage);
                    foreach ($listImage as $item) {
                        $car->$item = null;
                    }
                    $car->save();
                }

                // Commit transaction
                DB::commit();
                //
                return $this->response(true, $car, trans('The image of the car was updated successfully'));
            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollBack();

                return $this->response(false, null, $e->getMessage(), 400);
            }
        }

        return $this->response(false, null, trans('Car Not Found!'), 404);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function favorite(Request $request, $id)
    {
        $userFavorite = Customer::find($id);

        $records = Car::search($request)->leftJoin('favorites', 'cars.id', '=', 'favorites.car_id')
        ->where('favorites.customer_id', $id)
        ->paginate($request->itemsPerPage)->toArray();

        return response()->json([
            'success' => true,
            'data' => [
                'records' => $records,
                'masterData' => $this->getMasterData(),
                'userFavorite' => $userFavorite
            ]
        ], 200);
    }
}
