<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function groups(){
        $this->belongsToMany(Group::class);
    }
    public function student_preparation_brief(){
        $this->belongsToMany(Preparation_brief::class);
    }
    public function task(){
        $this->hasMany(Task::class);
    }
}
