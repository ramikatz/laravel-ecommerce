<?php

namespace App;

use App\Models\Role;
use App\Models\Order;
use App\Models\Review;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\Couponuser;
use App\Models\ShippingAddress;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*     protected $fillable = [
        'name', 'email', 'password',
    ]; */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function shippingaddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRoles($roles)
    {
        // roles table eke name kiyana feild ekata, $roles ekata apu value ho values match wenawada balanwa
        // $roles ekata data enne, gate walin authserviceprovider eken
        // array ekak use karana nisa thamai methana whereIn use wenne.
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }
    public function hasRole($role)
    {
        // eka value ekai gate walin enne. admin..
        //
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coupon()
    {
        return $this->hasOne(Couponuser::class, 'coupon_id');
    }
}
