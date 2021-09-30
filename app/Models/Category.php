<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model est l'équivalent de la classe CoreModel
// Quand Eloquent voit un modèle écrit en minuscule
// il en conclut qu'il doit existe son équivalent en table,
// mais au pluriel
// Classe Category ==> Table categories
class Category extends Model
{
    // Si on a absolument besoin de préciser le nom de table
    // protected $table = 'categories';
}
