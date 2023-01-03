<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    protected $table = "apprenant";
    public $timestamps= false;
    protected $fillable = [

        "Nom",
        "Prenom",
        "Email",
        "Phone",
        "Adress",
        "CIN",
        "Date_naissance",
        "Image"
    ];
}
