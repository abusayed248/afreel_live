<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundMony extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'amount',
        'phone',
        'bank_name',
        'account_number',
        'account_name',
        'routing_number',
        'payment_type',
        'type',
        'status',
    ];


    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

 
}
