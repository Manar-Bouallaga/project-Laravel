<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'date_reunion',
        'heure_rendez_vous',
        'lieu_rencontre',
        'code_qr_reunion',
    ];
    public function directeurs()
    {
        return $this->belongsToMany(Directeur::class, 'presences', 'reunion_id', 'directeur_id');
    }
    public function presences()
    {
        return $this->hasMany(Presence::class, 'reunion_id');
    }
}
