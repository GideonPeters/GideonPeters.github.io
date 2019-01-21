<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task as Task;
use App\Project;

class TasksController extends Controller
{
    //
    public function store(Request $request, $user_id, $project_id)
    {
        $project = Project::find($project_id);

        $task = new Task();
        $task->description = $request['description'];

        $task->project()
                ->associate($project)
                ->save();

        return response()->json([
            'status' => true,
            'message' => 'New Task Created',
            'data' => $task
        ], 200);
    }

    public function update(Request $request, $user_id, $project_id, $task_id)
    {
        $task = Task::where('id', $task_id)->first(); 
        
        // dd($task_id, $task);


        if(!$task) {
            return response()->json([
                'status' => false,
                'message' => 'This task does not exist',
                'data' => []
            ]);
        }

        $task->update(['description' => $request['description']]);
        $task->save();

        return response()->json([
            'status' => true,
            'message' => 'Task Details Updated',
            'data' => $task
        ], 200);

    }
}
