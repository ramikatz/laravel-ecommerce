<?php

namespace App\Models;

use App\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
