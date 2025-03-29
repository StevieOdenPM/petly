<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Filter\QueryFilter;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "product_id";
    protected $keyType = "int";
    public $timestamps = true;

    protected $fillable = [
        'product_name',
        'product_desc',
        'product_product_type_id',
        'pet_pet_types_id',
        'transaction_transaction_id',
        'product_stock',
        'product_price',
        'product_rating',
        'product_image'
    ];

    protected $hidden = [
        'product_id',
    ];

    public function petType()
    {
        return $this->belongsTo(PetType::class, 'pet_pet_types_id', 'pet_type_id');
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_product_type_id', 'product_type_id');
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_transaction_id', 'transaction_id');
    }

    public function carts()
    {
        return $this->belongsToMany(
            Cart::class,
            'cart_products',
            'foreign_product_id',
            'foreign_cart_id'
        )->withPivot('quantity');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
