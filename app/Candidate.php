<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    // filable
    protected $fillable = [
        'Nom',
        'prenom',
        'date_de_naissance',
        'poste_que_vous_souhaitez',
        'CV',
        'ville_de_residence',
        'lettre_de_motivation',
        'commentaires',
    ];

    // conectation to database tabel
    protected $table = 'candidats';
}


