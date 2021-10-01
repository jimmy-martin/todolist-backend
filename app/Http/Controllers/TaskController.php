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
        return response()->json(Task::all());
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
        $this->validate($request, [
            'title'      => 'string',
            'categoryId' => 'integer',
            'completion' => 'integer',
            'status'     => 'integer'
        ]);

        // si ma requête est en PUT
        if ($request->method() === 'PUT') {
            // si j'ai toutes mes données
            if ($request->has(['title', 'categoryId', 'completion', 'status'])) {
                $task = Task::find($id);

                if ($task) {
                    $task->title = $request->title;
                    $task->category_id = $request->categoryId;
                    $task->completion = $request->completion;
                    $task->status = $request->status;

                    $result = $task->save();

                    if ($result) {
                        return response()->json('', 200);
                    } else {
                        return response()->json('', 500);
                    }
                } else {
                    return response()->json('', 404);
                }
            } else {
                return response()->json('', 400);
            }

            // sinon si ma requete est en PATCH
        } else if ($request->method() === 'PATCH') {
            // si j'ai au moins une donnée
            if ($request->all() >= 1) {

                $task = Task::find($id);

                if ($task) {
                    if ($request->has('title')) {
                        $task->title = $request->title;
                    } else if ($request->has('categoryId')) {
                        $task->category_id = $request->categoryId;
                    } else if ($request->has('completion')) {
                        $task->completion = $request->completion;
                    } else {
                        $task->status = $request->status;
                    }

                    $result = $task->save();

                    if ($result) {
                        return response()->json($task, 200);
                    } else {
                        return response()->json('', 500);
                    }
                } else {
                    return response()->json('', 404);
                }
            } else {
                return response()->json('', 400);
            }
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
            $task->delete();
            return response()->json('', 204);
        }
    }
}
