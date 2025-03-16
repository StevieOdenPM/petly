<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $primaryKey = "user_user_id";

    protected $fillable = [
        'address',
        'phone_number'
    ];

    protected $hidden = [
        'user_user_id',
        'token',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
