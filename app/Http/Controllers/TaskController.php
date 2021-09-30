<?php

namespace App\Http\Controllers;

use App\Models\Task;

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
}
