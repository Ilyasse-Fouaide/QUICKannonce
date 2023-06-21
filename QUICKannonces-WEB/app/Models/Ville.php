<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = "villes";

    protected $fillable = [
        'nom_ville',
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class, "ville_id", "id");
    }
}
