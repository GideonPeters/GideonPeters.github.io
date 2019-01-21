<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project as Project;
use App\User;

class ProjectsController extends Controller
{
    //

    public function index($user_id) 
    {
        $user = User::find($user_id);

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'This user does not exist'
            ]);
        }
        $projects = Project::where('user_id',$user_id)->get();

        if($projects->isEmpty()) {
            return response()->json([
                'status' => 'false',
                'message' => 'This user has no projects',
                'data' => []
            ]);
        } 
        return response()->json([
            'status' => true,
            'message' => 'These projects belong to this user',
            'data' => $projects
        ], 200);
        
    }

    public function show($user_id, $project_id)
    {   
        $user = User::find($user_id);

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'This user does not exist'
            ]);
        }

        // $project = $user->projects()
        //                 ->where('id', $project_id)
        //                 ->first();

        $project = Project::where('id', $project_id)
                            ->where('user_id', $user_id)
                            ->first();

        if($project === null) {
            return response()->json([
                'status' => true,
                'message' => 'This project does not exist or has been deleted',
                'data' => []
            ]);
        }
        // $project = User::where('id',$user_id)->first()->projects;
        // dd($project);

        // $project = $project

        $project->load("tasks");

        return response()->json([
            'status' => true,
            'message' => 'This is the project details',
            'data' => $project
        ], 200);
    }

    public function store(Request $request, $user_id) 
    {   
        $user = User::find($user_id);
        $project = new Project();
        $project->title = $request['title'];
        $project->description = $request['description'];
        // $project->user_id = $user_id;

        $project->user()->associate($user)->save();


        return response()->json([
            'status' => true,
            'message' => 'New Project Created',
            'data' => $project
        ], 200);
    }

    public function update(Request $request)
    {
        $project = Project::update($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Project Details Updated',
            'data' => $project
        ], 200);
    }

    public function destroy($user_id, $project_id)
    {
        // $user = User::find($user_id);

        // $project = $user->projects()
        //                 ->where('id', $project_id)
        //                 ->first();                       

        $project = Project::where('id', $project_id)
                            ->where('user_id', $user_id)
                            ->first()
                            ->delete();

                            // dd($project_id, $user_id, $project);

        // $project->delete();

        return response()->json([
            'status' => true,
            'message' => 'Project deleted',
            'data' => []
        ], 200);
    }
}
