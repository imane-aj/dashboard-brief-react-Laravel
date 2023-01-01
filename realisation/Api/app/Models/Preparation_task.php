<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparation_task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function preparation_brief(){
        return $this->belongsTo(Preparation_brief::class);
    }
}
