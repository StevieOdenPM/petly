<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $primaryKey = "pet_id";

    protected $fillable = [
        'pet_name',
        'pet_gender',
        'pet_weight',
        'pet_type_id',
        'customer_user_user_id',
    ];

    public function customerDetails()
    {
        return $this->belongsTo(Customer::class);
    }

    public function petTypeDetails()
    {
        return $this->belongsTo(PetType::class);
    }
}
