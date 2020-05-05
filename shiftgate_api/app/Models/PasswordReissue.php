<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $key
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class PasswordReissue extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['email', 'key', 'created_at', 'updated_at', 'deleted_at'];

}
