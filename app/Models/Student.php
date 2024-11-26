<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $guard = 'student';

    protected $fillable = [
        'name',
        'email',
        'password',
        'classroom_id',
        'dob',
        'gender',
        'address',
        'phone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
