<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipping_addresses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
