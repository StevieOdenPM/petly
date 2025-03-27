<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $primaryKey = "transaction_transaction_id";

    protected $fillable = [
        'transaction_transaction_id',
        'quantity',
        'total_payment',
    ];

    protected $hidden = [
        'transaction_transaction_id',
    ];

    public function transaction() {
        return $this->hasOne(Transaction::class, 'transaction_transaction_id', 'transaction_id');
    }

    public function products() {
        return $this->belongsTo(Product::class);
    }
}
