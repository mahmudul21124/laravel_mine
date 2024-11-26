<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id'
    ];
    
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }
}
