<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = "user_id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public function role(): BelongsTo{
        return $this->belongsTo(Role::class);
    }
}
