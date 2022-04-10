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


class ProgrammerController extends Controller
{
    public function viewTaskDetails(Request $request){
        $taskId = $request->id;
        $choosenTask = Task::where('id', $taskId)->first();
        return view('taskDetails')->with('choosenTask', $choosenTask);
    }

    public function showUpdateForm(Request $request){
        $updateId = $request->id;
        $choosenTaskData = Task::where('id', $updateId)->first();
        return view('formUpdate')->with('choosenTaskData', $choosenTaskData);
    }

    public function showDash(Request $request){
        $tasklist = Task::where('assignedTo', Auth::User()->email)->where('status', "assigned")->get();
        return view('programmerDashboard')->with('taskList', $tasklist);        
    }

    public function showTaskDetails(Request $request){
        $taskId = $request->id;
        return redirect('/showTaskDetails/'.$taskId);
    }

    public function openCodeEditor(){
        return view('codeEditor');        
    }

    public function showUpdate(Request $request){
        $updateTaskId = $request->id;
        return redirect('/updateForm/'.$updateTaskId);
    }

    public function submitAnswer(Request $request){
        $answersId  = $request->id;
        $answer = $request->description;
        Task::where('id', $answersId)->update([
            'description' => $answer,
            'status' => 'in-progress'
        ]);
        return redirect('/programmerDashboard');
    }

    public function searchTask(Request $request){
        $userCheck = Auth::User()->email;
        $searchedPhrase = $request->search;
        if($searchedPhrase == ""){
            return redirect('/programmerDashboard');
        }
        if($searchedPhrase != ""){
            $searchResult = Task::where([
                ['description', 'like', "%{$searchedPhrase}%"],
                ['assignedTo', 'like', "%{$userCheck}%"],
                ['status', "assigned"],
                ])->get();
            return view('programmerDashboardSearch')->with('searchResult', $searchResult);
        }
    }
}
