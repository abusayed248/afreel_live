<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    use HasFactory;

    public function seller()
    {
        return $this->hasOne(User::class,'id','seller_id');
    }

    public function buyer()
    {
        return $this->hasOne(User::class,'id','buyer_id');
    }
}
