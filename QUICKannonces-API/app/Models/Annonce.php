<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $table = "annonces";

    protected $fillable = [
        "title",
        "description",
        "price",
        "nom",
        "email",
        "tel",
        "user",
        "category_id",
        "ville_id",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, "annonce");
    }
}
