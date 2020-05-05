<?php
namespace App\Models\Traits;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

trait MemberSearch
{
    public function scopeSearch($query, Request $request)
    {
        $isJoin = false;
        $tableName = Customer::getTableName();
        $sortBy = $request->sortBy ? $request->sortBy : 'id';
        $sortType = $request->sortDesc == 'true' ? 'desc' : 'asc';
        
        $query->select(
                        $tableName . '.id', 
                        $tableName . '.type',
                        $tableName . '.last_name',
                        $tableName . '.first_name', 
                        $tableName . '.fixed_phone_number',
                        $tableName . '.mobile_phone_number', 
                        $tableName . '.withdrawal_date',
                        $tableName . '.birthdate AS birthdate_ymd',
                        $tableName . '.withdrawal_date',
                        DB::raw('CONCAT('.$tableName . '.last_name, " ", '.$tableName . '.first_name) AS full_name')
                    );                        

        if(isset($request->id) && !empty($request->id)){
            $query->where($tableName.'.id', $request->id);
        }
        if(isset($request->name) && !empty($request->name)){
            $query->where(function($q) use ($tableName, $request) {
                $q->where($tableName . '.last_name', 'LIKE', $request->name . '%');            
                $q->orwhere($tableName . '.first_name', 'LIKE', $request->name . '%');
            });
        } 
        if(isset($request->phone) && !empty($request->phone)){
            $query->where(function($q) use ($tableName, $request) {
                $q->where($tableName.'.mobile_phone_number', 'LIKE', $request->phone . '%');            
                $q->orwhere($tableName.'.fixed_phone_number', 'LIKE', $request->phone . '%');
            });
        } 
        if(isset($request->birthdate_from) && !empty($request->birthdate_from)){
            $query->where($tableName.'.birthdate', '>', $request->birthdate_from);
        } 
        if(isset($request->birthdate_to) && !empty($request->birthdate_to)){
            $query->where($tableName.'.birthdate', '<', $request->birthdate_to);
        } 
        if(isset($request->created_from) && !empty($request->created_from)){
            $date = date('Y-m-d H:i:s', strtotime($request->created_from));
            $query->where($tableName.'.created_at', '>', $date);
        } 
        if(isset($request->created_to) && !empty($request->created_to)){
            $query->where($tableName.'.created_at', '<', $request->created_to . ' 23:59:59');
        } 
        if($sortBy == 'last_name') {
            $query->orderBy('full_name', $sortType);
        } else {
            $query->orderBy($tableName.'.'.$sortBy, $sortType);
        }
        $query->where(function ($query) {
            $query->where('is_deleted', 0)->orWhereNull('is_deleted');
        });

        return $query;
    }
} 
