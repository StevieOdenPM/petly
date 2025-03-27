<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $primaryKey = "cart_id";

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products',  'foreign_cart_id', 'foreign_product_id');
    }
}
