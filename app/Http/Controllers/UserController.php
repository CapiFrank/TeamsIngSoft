<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

       return view('users.index', [
         'users' => $users
       ]);
    }

    public function create(Request $request)
    {
 
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->job = $request->job;
        $user->password = $request->password;
       
        $user->save();
        

        return redirect()->route('users.index');
    }
}
