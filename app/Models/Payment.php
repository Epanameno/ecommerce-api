<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'amount', 'currency', 'status', 'stripe_payment_intent_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
