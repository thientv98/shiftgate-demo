<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandTransportationFee extends Model
{
    protected $fillable = ['from_prefecture_id', 'to_prefecture_id', 'fee', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prefecture()
    {
        return $this->belongsTo('App\Models\Prefecture', 'from_prefecture_id', 'to_prefecture_id');
    }

}
