<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'job' => 'required',
        'email' => [
            'required',
            'email',
            'unique:users,email'
        ],
        'password' => 'required|confirmed'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
 
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->job = $request->job;
        $user->password = $request->password;
       
        $user->save();
        return redirect()->route('users.index');
    }
      
    public function edit($user_id){
      $user = User::find($user_id);
      return view('users.editusr', compact('user'));
    }
      
    public function update(Request $data, $user_id){
      $validator = Validator::make($data->all(), [
        'name' => 'required',
        'job' => 'required',
        'email' => [
            'required',
            'email',
            'unique:users,email'
        ]
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
      $user = User::find($user_id);
      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->job = $data['job'];
      $user->update();
      return redirect()->route('users.index');
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
