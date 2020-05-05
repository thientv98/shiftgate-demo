<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $key
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class TmpRegistrations extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['email', 'password', 'key', 'created_at', 'updated_at', 'deleted_at'];

}
