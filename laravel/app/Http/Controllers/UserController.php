<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = \App\Models\User::all(); // Fetch all users
        return response()->json($users); 
    }

}
