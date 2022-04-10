<?php

// controllers
namespace App\Http\Controllers;
// Models
use App\Models\User;
use App\Models\Task;
// Requests
use Illuminate\Http\Request;
// Facades
use Illuminate\Support\Facades\Auth;


class ManagerController extends Controller
{
    public function showDash(){
        $tasklist = Task::where('createdBy', Auth::User()->email)->get();
        return view('managerDashboard')->with('taskList', $tasklist);
    }

    public function showCreate(){
        $users = User::where('usertype', 'programmer')->get();
        return view('ManagerCreate')->with("users", $users);        
    }

    public function createTask(Request $request){
        $createdTask = Task::create([
            'name' => $request->name,
            'status' => 'assigned',
            'createdBy' => Auth::User()->email,
            'assignedTo' => $request->assigned,
            'description' => $request->description
         ]);
        if($createdTask) {
            $tasklist = Task::where('createdBy', Auth::User()->email)->get();

            return redirect('/managerDashboard');
        }
        return redirect(403);      
    }

    public function showUpdate(Request$request){
        $taskId = $request->id;
        $users = User::where('usertype', 'programmer')->get();
        $taskData = Task::where('id', $taskId)->first();

        return view('managerUpdate')->with('taskData', $taskData)->with('users', $users);
    }

    public function updateTask(Request $request){
        Task::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'assigned',
            'assignedTo' => $request->assigned
        ]);

        return redirect('/managerDashboard');
    }

    public function deletePost(Request $request){
        $postId = $request->id;
        Task::where('id', $postId)->delete();

        return redirect('/managerDashboard');
    }
}
