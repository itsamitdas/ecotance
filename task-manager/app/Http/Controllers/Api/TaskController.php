<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return $tasks;
    }

    public function save(TaskRequest $request)
    {
        $tasks = Task::create($request->only(['title', 'description', 'completed_at', 'status']));
        return $tasks;
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Task $task, TaskRequest $request)
    {
        $task->title = $request->title;
        $task->status = $request->status;
        $task->description = $request->description;

        //IF status is Completed then current date time inserted
        $task->completed_at = $request->status == 'Completed' ? now() : null;
        $task->update();
        return $task;
    }
}
