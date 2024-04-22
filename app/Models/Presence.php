<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'directeur_id',
        'reunion_id',
        'date_heure_presence',
        'signature',
    ];
}
