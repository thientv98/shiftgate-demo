<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $customer_id
 * @property int $car_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Customer $customer
 * @property Car $car
 */
class Favorite extends Base
{
    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'car_id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
}
