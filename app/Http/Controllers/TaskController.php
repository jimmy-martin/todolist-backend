<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * List all tasks
     *
     * @return void
     */
    public function list()
    {
        return response()->json(Task::all()->load('category'));
    }

    /**
     * Show one task
     *
     * @param integer $id task id
     * @return void
     */
    public function item(int $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json('', 404);
        }
        return response()->json(Task::find($id));
    }

    /**
     * Create task
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        // une façon de valider des données
        // $this->validate($request, [
        //     'title'      => 'required|string',
        //     'categoryId' => 'required|integer',
        //     'completion' => 'integer',
        //     'status'     => 'integer'
        // ]);

        // Autre façon de faire :
        // On va verifier l'existence d'un champ title et category_id
        // et qu'elles ne sont pas vides
        // la méthode filled() vérifie l'existence de la clé et que le contenu n'est pas vide
        if ($request->filled(['title', 'categoryId'])) {
            $newTask = new Task();

            $newTask->title       = $request->input('title');
            $newTask->category_id = $request->input('categoryId');
            $newTask->completion  = $request->input('completion', 0);
            $newTask->status      = $request->input('status', 1);

            $result = $newTask->save();

            if ($result) {
                return response()->json($newTask, 201);
            } else {
                return response()->json('', 500);
            }
        } else {
            // on renvoie un code 400 pour indiquer qu'il manques des données
            return response()->json('', 400);
        }
    }

    /**
     * Update task
     *
     * @param Request $request
     * @param integer $id task id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $task = Task::find($id);

        if ($task) {
            if ($request->isMethod('put')) {
                // si j'ai toutes mes données
                if ($request->filled(['title', 'categoryId', 'completion', 'status'])) {


                    $task->title = $request->input('title');
                    $task->category_id = $request->input('categoryId');
                    $task->completion = $request->input('completion');
                    $task->status = $request->input('status');

                    $result = $task->save();

                    if ($result) {
                        return response()->json($task);
                    } else {
                        return response()->json('', 500);
                    }
                } else {
                    return response()->json('', 400);
                }

                // sinon si ma requete est en PATCH
            } else {

                // On aurait pu aussi utiliser cette condition
                // if ($request->all() >= 1) {}

                // si j'ai au moins une donnée
                $hasAtLeastOneData = false;

                if ($request->filled('title')) {
                    $hasAtLeastOneData = true;
                    $task->title = $request->title;
                }

                if ($request->filled('categoryId')) {
                    $hasAtLeastOneData = true;
                    $task->category_id = $request->categoryId;
                }

                if ($request->filled('completion')) {
                    $hasAtLeastOneData = true;
                    $task->completion = $request->completion;
                }

                if ($request->filled('status')) {
                    $hasAtLeastOneData = true;
                    $task->status = $request->status;
                }

                if ($hasAtLeastOneData) {
                    $result = $task->save();

                    $result = $task->save();

                    if ($result) {
                        return response()->json($task);
                    } else {
                        return response()->json('', 500);
                    }
                } else {
                    return response()->json('', 400);
                }
            }
        } else {
            return response()->json('', 404);
        }
    }

    /**
     * Delete task
     *
     * @param integer $id task id
     * @return void
     */
    public function delete(int $id)
    {
        $task = Task::find($id);

        if ($task) {
            $result = $task->delete();

            if ($result) {
                return response()->json('');
            } else {
                return response()->json('', 500);
            }
        }
    }
}
