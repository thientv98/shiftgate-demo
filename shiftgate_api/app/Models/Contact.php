<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $car_id
 * @property int $admin_id
 * @property string $target
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Car $car
 * @property Admin $admin
 */
class Contact extends Base
{
    /**
     * @var array
     */
    protected $fillable = ['car_id', 'admin_id', 'target', 'content', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\User');
    }
}
