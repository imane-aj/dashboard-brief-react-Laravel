<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneFormation extends Model
{
    use HasFactory;

    protected $table = "anne_formation";
    public $timestamps= false;
    protected $fillable = [


        "Annee_scolaire",


    ];
    public function groups(){
        return $this->hasMany(Groupes::class);
    }
}
