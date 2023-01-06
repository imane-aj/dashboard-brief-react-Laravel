<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    use HasFactory;
    protected $table = "brief";
    public $timestamps= false;
    protected $fillable = [
    "Date_affectation",
    "Preparation_brief_id",
    "Apprenant_id"
    ];

    public function tasks(){
        return $this->belongsTo(Tache::class);
    }
}
