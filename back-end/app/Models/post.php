<?php

namespace App\Models;

use App\Models\asso;
use App\Models\Rating;
use App\Models\Signal;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'email',
        'tele',
        'image',
        'Categorie_id',
        'localisation'
    ];
    //fonction pour faire la relation avec formateur(createur)
    public function asso()
    {
        return $this->belongsTo(User::class);
    }

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function signals()
    {
        return $this->hasMany(Signal::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    //fonction pour faire la relation avec les videos d'un cour
   


    //  //fonction pour faire la relation avec le commentaire
    //  public function commentaires()
    //  {
    //     return $this->belongsToMany(User::class,Commentaire::class);
    //  }
    
    

    

}
