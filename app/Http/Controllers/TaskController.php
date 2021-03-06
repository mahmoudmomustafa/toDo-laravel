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
        return view('tasks.index');
    }
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
    public function store()
    {
        $attr = request()->validate([
            "task_title" => ['required', 'string', 'min:3'],
            "description" => ['required', 'string', 'min:5']
        ]);
        $attr['user_id'] = auth()->id();
        Task::create($attr);
        return redirect('/tasks');
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function update(Task $task)
    {
        $task->update([
            'done' => request()->has('done')
        ]);
        return back();
        $task->update(request(["task_title", "description"]));
        return view('tasks.show');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
