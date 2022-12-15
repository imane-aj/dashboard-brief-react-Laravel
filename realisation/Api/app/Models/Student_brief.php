<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_brief extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tasks(){
        $this->belongsTo(Task::class);
    }
}
