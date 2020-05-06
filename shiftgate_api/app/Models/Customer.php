<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\MemberSearch;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Musonza\Chat\Traits\Messageable;

/**
 * @property int $id
 * @property int $prefecture_id
 * @property string $type
 * @property string $last_name
 * @property string $first_name
 * @property string $last_name_kana
 * @property string $first_name_kana
 * @property string $email
 * @property string $password
 * @property string $birthdate
 * @property string $zipcode
 * @property string $address
 * @property string $mobile_phone_number
 * @property string $fixed_phone_number
 * @property boolean $is_deleted
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Prefecture $prefecture
 * @property BrowsingHistory[] $browsingHistories
 * @property Car[] $cars
 * @property Favorite[] $favorites
 */
class Customer extends Base implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Notifiable, Authorizable, Authenticatable, Messageable;
    use MemberSearch;

    const TYPE_C = 'C';
    const TYPE_D = 'D';

    protected $hidden = [
		'password',
    ];

    /**
     * @var array
     */
    protected $fillable = ['prefecture_id', 'type', 'last_name', 'first_name', 'last_name_kana', 'first_name_kana', 'email', 'password', 'birthdate', 'zipcode', 'address', 'mobile_phone_number', 'fixed_phone_number', 'is_deleted', 'withdrawal_date', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prefecture()
    {
        return $this->belongsTo('App\Models\Prefecture');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function browsingHistories()
    {
        return $this->hasMany('App\Models\BrowsingHistory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carCustomer()
    {
        return $this->hasMany('App\Models\Car', 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carBuyer()
    {
        return $this->hasMany('App\Models\Car', 'buyer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    public function getBirthdateYmdAttribute($value)
    {
        return date('Y/m/d', strtotime($value));
    }
    
    public function getMobilePhoneNumberFormatAttribute($value)
    {
        $value = preg_replace("/[^\d]/","", $value);
        $value = preg_replace("/(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $value);
        return $value;
    }

    public function getFixedPhoneNumberFormatAttribute($value)
    {
        $value = preg_replace("/[^\d]/","", $value);
        $value = preg_replace("/^0?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $value);
        return $value;
    }
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getWithdrawaldateYmdhiAttribute($value)
    {
        return !empty($value) ? date('Y/m/d H:i', strtotime($value)) : null;
    }

}
