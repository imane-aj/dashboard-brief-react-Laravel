<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparation_brief extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacher(){
        $this->belongsTo(Teacher::class);
    }

    public function students(){
        $this->belongsToMany(Student::class, 'student_briefs');
    }
    public function preparation_tasks(){
        $this->hasMany(Preparation_task::class);
    }
}
