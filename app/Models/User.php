<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table = "users";
    protected $primaryKey = "user_id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'username',
        'email',
        'password',
        'phone_number',
        'token'
    ];

    protected $hidden = [
        'user_id',
        'password',
        'token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo{
        return $this->belongsTo(Role::class);
    }

    public function customerDetails() {
        return $this->hasOne(Customer::class, 'user_user_id', 'user_id');
    }

    public function courierDetails() {
        return $this->belongsTo(Courier::class, 'user_user_id', 'user_id');
    }

    public function adminDetails() {
        return $this->belongsTo(Admin::class, 'user_user_id', 'user_id');
    }
}
