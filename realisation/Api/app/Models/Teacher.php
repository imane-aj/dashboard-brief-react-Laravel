<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function groups(){
        $this->hasMany(Group::class);
    }

    public function teacher_preparation_brief(){
        $this->hasMany(Preparation_brief::class);
    }
}
