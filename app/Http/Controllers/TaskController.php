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
        $this->validate($request, [
            'title'      => 'required|string',
            'categoryId' => 'required|integer',
            'completion' => 'integer',
            'status'     => 'integer'
        ]);

        $newTask = new Task();

        $newTask->title = $request->title;
        $newTask->category_id = $request->categoryId;
        $newTask->completion = $request->completion;
        $newTask->status = $request->status;

        $result = $newTask->save();

        if ($result) {
            // return response()->json($newTask, 200);
            abort(201, '201 Created');
        } else {
            // return response()->json(['error' => '500 Internal Server Error'], 500);
            abort(500, '500 Internal Server Error');
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
                        // return response()->json($task, 200);
                        abort(204, '204 No Content');
                    } else {
                        // return response()->json(['error' => '500 Internal Server Error'], 500);
                        abort(500, '500 Internal Server Error');
                    }
                } else {
                    // return response()->json(['error' => '404 Not Found'], 404);
                    abort(404, '404 Not Found');
                }
            } else {
                // return response()->json(['error' => '400 Bad Request'], 400);
                abort(400, '400 Bad Request');
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
                        // return response()->json($task, 200);
                        abort(204, '204 No Content');
                    } else {
                        // return response()->json(['error' => '500 Internal Server Error'], 500);
                        abort(500, '500 Internal Server Errir');
                    }
                } else {
                    // return response()->json(['error' => '404 Not Found'], 404);
                    abort(404, '404 Not Found');
                }
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

        if($task){
            $task->delete();
            // return response()->json($task, 204);
            abort(204, '204 No Content');
        }
    }
}
