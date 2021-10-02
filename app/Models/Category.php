<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Automatiquement, Eloquent va par défaut chercher dans la table
// correspondant au nom du modèle mis au pluriel :
// Modèle Category => on va chercher dans la table 'categories'
// A partir des champs de la table 'categories', Eloquent va
// déduire automatiquement les propriétés du modèle Category !
class Category extends Model
{
    // Si on a absolument besoin de préciser le nom de table
    // protected $table = 'categories';
}
