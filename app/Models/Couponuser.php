<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Couponuser extends Model
{
    public function user()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }
}
