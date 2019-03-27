<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        auth();
        $tasks = Task::where('user_id', auth()->id())->get();

        return view('tasks', compact("tasks"));
    }

    public function store()
    {
        $attr = request()->validate([
            "task_title" => ['required', 'min:3'],
            "description" => ['required', 'min:5']
        ]);
        $attr['user_id'] = auth()->id();
        Task::create($attr);
        return redirect('/tasks');
    }
}
