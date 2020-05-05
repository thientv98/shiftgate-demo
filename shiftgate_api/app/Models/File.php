<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $car_id
 * @property string $image_name
 * @property string $image_path
 * @property boolean $is_delete_ban
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Car $car
 */
class File extends Base
{
    /**
     * @var array
     */
    protected $fillable = ['car_id', 'image_name', 'image_path', 'is_delete_ban', 'type', 'is_use_estimate', 'is_signature_contract', 'created_at', 'updated_at', 'deleted_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
}
