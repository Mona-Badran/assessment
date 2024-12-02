<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = \App\Models\User::all(); // Fetch all users
        return response()->json($users); 
    }
    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
    
        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
    
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
        
    }
}
