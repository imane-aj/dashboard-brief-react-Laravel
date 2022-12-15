<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacher(){
        $this->hasOne(Teacher::class);
    }
    public function students(){
        $this->belongsToMany(Student::class);
    }
    public function formation(){
        $this->belongsTo(Formation_year::class);
    }
}
