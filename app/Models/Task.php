<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // On va expliciter la relation entre une tâche et une categorie
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
