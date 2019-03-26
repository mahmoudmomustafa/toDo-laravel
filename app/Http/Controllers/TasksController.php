<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Tasks $tasks){

        return view('/home',compact('tasks'));
    }
    public function index()
    {
        auth();
        $tasks = Tasks::where('user_id', auth()->id())->get();

        return view('/home', compact('tasks'));
    }

    public function store()
    {
        $attr = request()->validate([
            "task_title" => ['required', 'min:3'],
            "description" => ['required', 'min:5']
        ]);
        $attr['user_id'] = auth()->id();
        Tasks::create($attr);
        return redirect('/home');
    }
}
