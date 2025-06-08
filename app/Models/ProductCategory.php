<?php

namespace App\Models;

//use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function subcategory()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }
}
