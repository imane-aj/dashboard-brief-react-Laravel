<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function groups(){
        return $this->belongsToMany(Group::class, 'student_groups');
    }
    public function student_preparation_brief(){
        return $this->belongsToMany(Preparation_brief::class, 'student_briefs');
    }
    public function task(){
        return $this->hasMany(Task::class);
    }
}
