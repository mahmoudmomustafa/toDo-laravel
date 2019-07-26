<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $incompletedTasks = Task::where(['done' => false, 'user_id' => auth()->id()])->get();
        $completedTasks = Task::where(['done' => true, 'user_id' => auth()->id()])->get();
        return view('home', compact('incompletedTasks', 'completedTasks'));
    }
}
