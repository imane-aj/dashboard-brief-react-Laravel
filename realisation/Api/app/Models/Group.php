<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacher(){
        return $this->hasOne(Teacher::class);
    }
    public function students(){
        return $this->belongsToMany(Student::class, 'student_groups');
    }
    public function formation(){
        return$this->belongsTo(Formation_year::class);
    }
}
