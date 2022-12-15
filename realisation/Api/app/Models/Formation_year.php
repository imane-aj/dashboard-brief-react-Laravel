<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation_year extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function groups(){
        $this->hasMany(Group::class);
    }
}
