<?php

// Controllers
namespace App\Http\Controllers;
// Facades
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// Requests
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
// Models
use App\Models\User;
use App\Models\Task;


class SignController extends Controller
{
    public function register(Request $request) {
        // $request->validate([
        //     'name'=>'string|required|min:2',
        //     'email'=>'email|required|unique:users',
        //     'password'=>'confirmed|required|min:6|max:15',
        //     'repeatpassword'=>'required|min:6|max:15',
        //     'usertype'=>'required',
        // ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype
        ]);
        if($user) {
            Auth::login($user); // put in session
            return redirect('/login');
        }
        return abort(403);
    }

    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            if(Auth::User()->usertype == "manager"){
                $tasklist = Task::where('createdBy', Auth::User()->email)->get();
                return view('managerDashboard')->with('taskList', $tasklist);    
            }
            else if(Auth::User()->usertype == "programmer"){
                $tasklist = Task::where('assignedTo', Auth::User()->email)->where('status', "assigned")->get();
                return view('programmerDashboard')->with('taskList', $tasklist);    
            }
        }   
        return abort(403);
    }

    public function logOut(){
        Auth::logout();
        return redirect('/');
    }
}
