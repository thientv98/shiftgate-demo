<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $maker_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Maker $maker
 */
class CarModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'models';
    public $timestamps = true;
    /**
     * @var array
     */
    protected $fillable = ['maker_id', 'name', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maker()
    {
        return $this->belongsTo('App\Models\Maker');
    }
}
