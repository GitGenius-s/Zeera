<?php

namespace App\Http\Controllers;

use App\Assigns;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('admin');
     }
    public function index()
    {
        //
    }

    public function create()
    {
        return view("tasks.create");
    }

    
    public function store(Request $request)
    {
        // dd($request);
        $data=$request->validate([
            'parent_id'=>'nullable|integer|exists:tasks,task_id',
            'task_name'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'created_date' => 'required|date',
            'due_date'=>'required|date',
        ]);
        $auth_user=Auth::user();
        $data['parent_id']=$request->parent_id;
        $data['taskCreatedBy']=$auth_user->id;
        $task=Task::create($data);
        return redirect('task-list');
    }

    public function show(Request $request)
    {
        $datas = Task::whereNull("parent_id")->paginate(3);
        $tasks = [];
        foreach($datas as $data) {
            $arr = [];
            $arr['parent'] = $data->toArray();
            $arr['subTask'] = $data->subtasks->toArray();
            array_push($tasks, $arr);
        }
        return view("tasks.show",compact('tasks','datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function updateTask(Request $request)
    {
        $task_id = $request->input('task_id');
        $user_id = $request->input('user_id');
        Assigns::where('user_id',$user_id)
          ->where('task_id',$task_id)
          ->update(['status'=>$request->status,'assign_date'=>$request->assign_date]);
        return redirect('task/'.$task_id);
    }

    public function deleteTask(Request $request)
    {
        print_r($request->user_id);
        Assigns::where('user_id',$request->user_id)
        ->where('task_id',$request->task_id)->delete();
        // dd($request);
    }

    public function assignTask(Request $request)
    {
        // $data='selva';
        // dd($request->assign_date);
        $data=$request->validate([
            'user_id'=>'required|integer',
            'task_id'=>'required|integer',
            'status' => 'required',
            'assign_date'=>'required|date',
            'completed_date'=> 'nullable|date',
        ]);
        // $assign=$this->sendAssignMail($data);
        // return new AssignResource($assign);
        // dd($data);
        // $assign=Assigns::create($data);
        return redirect('task/'.$request->task_id);
    }

    public function listUsers($task_id) 
    {
        $task=Task::where('task_id',$task_id)->first();
        $tasks=Task::all();
        $users=User::all();
        // $users = json_decode($users);
        $assigns = Assigns::where('task_id',$task_id)->get();
        $users1=[];
        foreach($assigns as $assign)
        {
            $user=User::findOrFail($assign->user_id);
            $users1['name']=$user->name;
        }
        return view('users.show',compact('users','task','assigns','tasks','users1'));
    }

    public function taskList(Request $request)
    {
        $users=User::all();
        // $lowPrioritiesTask=Task::where('priority','low')->with('assigns')->get();
        // $mediumPrioritiesTask=Task::where('priority','medium')->with('assigns')->get();
        // $highPrioritiesTask=Task::where('priority','high')->with('assigns')->get();
        // $assigns1=$lowPrioritiesTask->assigns;
        // $assign=Assigns::with('user')->get();
        // $user=User::where('email',$request->input('buttonValue'))->first();
        // $assign=Assigns::where('user_id',$user->user_id)->get();
        // if($user!==null){
        //     dd('hi');
        //     // dd($user);
        // }
        // dd($user);
        return view('tasks.show1',compact('users'));
    }

    public function selva(Request $request)
    {
        $user=User::where('email',$request->input('buttonValue'))->first();
        $assigns=Assigns::where('user_id',$user->id)->get();
        // dd($assigns);
        $tasks=Task::all();
        $data = [
            'user' => $user,
            'assigns' => $assigns,
            'tasks' => $tasks,
        ];
        return response()->json($data);
    }
}
