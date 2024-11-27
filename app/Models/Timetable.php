<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'classroom_id',
        'subject_id',
        'teacher_id',
        'day',
        'startTime',
        'endTime'
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
