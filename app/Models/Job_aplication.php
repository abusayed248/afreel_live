<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_aplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'post_id',
        'cover_letter',
        'file',
        'seller_deadline',
        'seller_amount',
    ];


    public function seller()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
