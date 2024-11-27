<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $guard = 'teacher';

    protected $fillable = [
        'name',
        'email',
        'password',
        'designation_id',
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

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function classroom(){
        return $this->hasMany(Classroom::class);
    }

    public function timetable(){
        return $this->hasMany(Timetable::class);
    }
}