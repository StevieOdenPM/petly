<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryClass extends Model
{
    protected $primaryKey = "delivery_class_id";

    protected $fillable = [
        'delivery_class_price',
        'delivery_class_name',
        'delivery_class_desc',
    ];
}
