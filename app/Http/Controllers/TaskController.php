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

        return view('tasks.index', compact("tasks"));
    }
    public function show(Task $task){
        // $this->authorize('view', $task);
        return view('tasks.show', compact("task"));
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
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function update(Task $task){

        $task->update(request(["task_title","description"]));
        return redirect('/tasks');
    }
    public function destroy(Task $task){
        $task->delete();
        return redirect('/tasks');
    }
}
