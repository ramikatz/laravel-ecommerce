<?php

namespace App\Models;

use App\Models\Order;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function productcategories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category', 'product_id', 'category_id');
    }

    public function order_items()
    {
        //return $this->belongsToMany(Order::class);
        return $this->belongsToMany(Order::class, 'order_items', 'product_id', 'order_id')->withTimestamps()->withPivot('price', 'quantity');;
    }
    public function productimages()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * The attributes that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attribute', 'product_id', 'attribute_id')->withTimestamps()->withPivot('value', 'quantity', 'price');
    }
}
