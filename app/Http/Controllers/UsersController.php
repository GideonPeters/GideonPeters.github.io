<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        if(!$users) {
            return response()->json([
                'status' => false,
                'message' => 'No users yet',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'These are all the users',
            'data' => $users
        ], 200);
    }

    public function show($user_id)
    {
        $user = User::find($user_id);

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'This user does not exist',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'This is the user information',
            'data' => $user
        ]);
    }

    public function store(Request $request) 
    {
        // dd('hello');
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'New User Created',
            'data' => $user
        ], 200);
    }

    public function update($user_id) 
    {
        $user = User::find($user_id);

        $user->update(request()->all());

        return response()->json([
            'status' => true,
            'message' => 'User Information Updated',
            'data' => $user
        ], 200);
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);

        $user->delete();

        $users = User::all();

        return response()->json([
            'status' => true,
            'message' => 'These are the remaining Users',
            'data' => $users
        ], 200);
    }
}
