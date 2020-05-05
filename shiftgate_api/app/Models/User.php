<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $last_name_kana
 * @property string $first_name_kana
 * @property string $email
 * @property string $password
 * @property boolean $is_deleted
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property int $created_user_id
 * @property int $updated_user_id
 * @property int $deleted_user_id
 * @property Contact[] $contact
 */
class User extends Base implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Notifiable, Authorizable, Authenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    protected $hidden = [
		'password',
    ];
    
    /**
     * @var array
     */
    protected $fillable = ['last_name', 'first_name', 'last_name_kana', 'first_name_kana', 'email', 'password', 'is_deleted', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contact()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
