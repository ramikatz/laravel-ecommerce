<?php

namespace App\Models;

use App\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function order_items()
    {
        //return $this->belongsToMany(Product::class);
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')
            ->withTimestamps()
            ->withPivot('price', 'quantity');
    }
    public function deliveryuser()
    {
        return $this->belongsTo(User::class, 'id', 'deliveryperson_id');
    }
    /**
     * Get the user associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function owneruser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
