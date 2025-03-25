<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'product_stock',
        'product_price',
        'product_rating',
        'product_image'
    ];

    public function petType()
    {
        return $this->belongsTo(PetType::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
    
}
