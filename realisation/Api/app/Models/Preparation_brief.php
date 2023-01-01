<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparation_brief extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'student_briefs');
    }
    public function preparation_tasks(){
        return $this->hasMany(Preparation_task::class);
    }
}
