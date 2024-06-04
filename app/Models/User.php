<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'name',
        'email',
        'password',
        'username',
        'provider',
        'provider_id',
        'is_activated',
        'phone',
        'job_title',
        'job_type',
        'job_category',
        'age', 'tag',
        'language',
        'school',
        'school_passing_year',
        'inter',
        'inter_passing_year',
        'graduation',
        'graduation_passing_year',
        'certified',
        'country',
        'city',
        'photo',
        'about_info',
        'user_type',
        'hire_count',
        'company_name',
        'about_company'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'tag' => 'array'
    ];
}
