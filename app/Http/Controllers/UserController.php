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

    /* public function destroy($user){

      $user = User::find($user);

      $user->delete();

      return redirect()->route('users.index');
    } */

    public function destroy($userId)
{
    $user = User::find($userId);

    if ($user) {
        $user->delete();
    }

    return redirect()->route('users.index');
}

}
