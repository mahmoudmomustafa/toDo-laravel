<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Task $task){

        return view('/home',compact('task'));
    }
    public function index()
    {
        auth();
        $task = Tasks::where('user_id', auth()->id())->get();

        return view('/home', compact('task'));
    }

    public function store()
    {
        $attr = request()->validate([
            "task_title" => ['required', 'min:3'],
            "description" => ['required', 'min:5']
        ]);
        $attr['user_id'] = auth()->id();
        Task::create($attr);
        return redirect('/home');
    }
}
