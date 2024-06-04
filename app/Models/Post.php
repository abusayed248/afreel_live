<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'job_title', 'slug', 'job_type', 'job_category', 'career_level','job_description', 'when_needed', 'amount', 'skill', 'deadline', 'file', 'gender',
    ];


    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function hire() {
        return $this->belongsTo(Hire::class, 'id', 'post_id');
    }

    protected $casts = [
        'skill' => 'array', // Cast skill attribute to array
    ];

}
