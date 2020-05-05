<?php
namespace App\Models\Traits;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

trait CarSearch
{
    public function scopeSearch($query, Request $request)
    {
        $sortBy = ($request->sortBy && $request->sortBy != 'actions') ? $request->sortBy : 'id';
        $sortDesc = $request->sortDesc == 'false' ? 'asc' : 'desc';

        $query = Car::exclude(['image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10', 'image11', 
            'image12', 'image13', 'image14', 'image15', 'image16', 'image17', 'image18', 'image19', 'image20', 'image21', 'image22', 
            'image23', 'image24', 'image25', 'development_image', 'inspection_image', 'liability_insurance_image'], true)
            ->addSelect('cars.id', 'customers.type as customer_type', 'statuses.name as statuses_code')
            ->leftJoin('customers', 'customers.id', '=', 'cars.customer_id')
            ->leftJoin('statuses', 'statuses.code', '=', 'cars.public_status_code')
            ->orderBy($sortBy, $sortDesc);


        if(isset($request->maker_name) && !empty($request->maker_name)){
            $query->where('cars.maker_name', 'like', '%'.$request->maker_name.'%');
        }

        if(isset($request->car_name) && !empty($request->car_name)){
            $query->where('cars.car_name', 'like', '%'.$request->car_name.'%');
        }

        if(isset($request->model_year) && !empty($request->model_year)){
            $query->where('cars.model_year', 'like', '%'.$request->model_year.'%');
        }

        if(isset($request->mileage_from) && !empty($request->mileage_from)){
            $query->where('cars.mileage', '>=', $request->mileage_from);
        }

        if(isset($request->mileage_to) && !empty($request->mileage_to)){
            $query->where('cars.mileage', '<=', $request->mileage_to);
        }

        if(isset($request->customer_type) && !empty($request->customer_type)){
            $query->whereHas('customer', function($q) use($request){
                $q->where('type', $request->customer_type);
            })->get();
        }

        if(isset($request->published_date_from) && !empty($request->published_date_from)){
            $date = date('Y-m-d H:i:s', strtotime($request->published_date_from));
            $query->where('cars.published_date', '>=', $date);
        }

        if(isset($request->published_date_to) && !empty($request->published_date_to)){
            $date = date('Y-m-d H:i:s', strtotime($request->published_date_to));
            $query->where('cars.published_date', '<=', $date);
        }

        if(isset($request->public_status_code) && !empty($request->public_status_code)){
            $query->whereHas('status', function($q) use($request){
                $q->where('code', $request->public_status_code);
            })->get();
        }

        if(isset($request->trading_no) && !empty($request->trading_no)){
            $query->where('cars.trading_no', 'like', '%'.$request->trading_no.'%');
        }

        if(isset($request->status_code) && !empty($request->status_code)){
            switch ($request->status_code){
                case 101:
                    $query->where('cars.is_in_transaction', 1);
                    break;
                case 201:
                    $query->where('cars.is_in_contract', 1);
                    break;
                case 301:
                    $query->where('cars.is_car_delivery_complete', 1);
                    break;
                case 901:
                    $query->where('cars.is_trading_complete', 1);
                    break;
            }
        }

        return $query;
    }
} 
