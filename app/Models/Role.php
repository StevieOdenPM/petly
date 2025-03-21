<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "role_id";
    protected $keyType = "int";
    public $timestamps = true;

    protected $fillable = [
        'role_name',
    ];

    public function user(): HasMany{
        return $this->hasMany(User::class);
    }
}
