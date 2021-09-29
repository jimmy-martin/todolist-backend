<?php

namespace App\Http\Controllers;

use Symfony\Component\VarDumper\Cloner\Data;

class CategoryController extends Controller
{
    public function list()
    {
        $categoriesList = [
            1 => [
                'id' => 1,
                'name' => 'Chemin vers O\'clock',
                'status' => 1
            ],
            2 => [
                'id' => 2,
                'name' => 'Courses',
                'status' => 1
            ],
            3 => [
                'id' => 3,
                'name' => 'O\'clock',
                'status' => 1
            ],
            4 => [
                'id' => 4,
                'name' => 'Titre Professionnel',
                'status' => 1
            ]
        ];

        // dd permet de dumper une variable et de stopper le code juste après
        // dd(response());

        return response()->json($categoriesList);
    }

    public function item(int $id)
    {
        $categoriesList = [
            1 => [
                'id' => 1,
                'name' => 'Chemin vers O\'clock',
                'status' => 1
            ],
            2 => [
                'id' => 2,
                'name' => 'Courses',
                'status' => 1
            ],
            3 => [
                'id' => 3,
                'name' => 'O\'clock',
                'status' => 1
            ],
            4 => [
                'id' => 4,
                'name' => 'Titre Professionnel',
                'status' => 1
            ]
        ];

        if (!array_key_exists($id, $categoriesList)) {
            // abort() stoppe l'execution de la page
            abort(404);
        }

        return response()->json($categoriesList[$id]);
    }
}
