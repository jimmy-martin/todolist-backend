<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * List all categories
     *
     * @return void
     */
    public function list()
    {
        // grâce à l'ORM Eloquent, je peux récupérer toutes mes catégories via la méthode all()
        $categoriesList = Category::all();

        // dd permet de dumper une variable et de stopper le code juste après
        // dd(response());

        return response()->json($categoriesList);
    }

    /**
     * Show one category
     *
     * @param integer $id category id
     * @return void
     */
    public function item(int $id)
    {
        $category = Category::find($id);
        // dd($category);

        if (!$category) {
            // abort() stoppe l'execution de la page
            abort(404);
        }

        return response()->json($category);
    }
}
