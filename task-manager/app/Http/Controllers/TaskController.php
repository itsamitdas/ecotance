<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{

   public function index() {
    $tasks = Task::all();
    return view('welcome',['tasks'=>$tasks]);
   }

   public function addNewTask(){
       return view('add-task');
   }

    /**
     * @param TaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
   public function store(TaskRequest $request){
       $taskData = $request->validated();
       if ($taskData['status'] === 'Completed') {
           $taskData['completed_at'] = now();
       } else {
           $taskData['completed_at'] = null;
       }
       $taskData['description'] = $request->request->get('description') ?? null;

       Task::create($taskData);
       return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
   }

   public function edit(Task $task){
       return view('tasks-edit', compact('task'));
   }

    public function update(Task $task,TaskRequest $request) {
        $task->title = $request->title;
        $task->status = $request->status;
        $task->description = $request->description;

        $task->completed_at = $request->status == 'Completed' ? now() : null;
        $task->update();
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');;
    }
}
