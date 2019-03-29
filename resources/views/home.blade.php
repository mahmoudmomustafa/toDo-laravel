@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="content">
        {{-- show tasks --}}
        <div class="row justify-content-center show-task">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your Tasks</div>

                    <div class="card-body">
                        <div class="tasks">
                            <div class="addTask">
                                <a href="/tasks">
                                    <div class="add">
                                        +
                                    </div>
                                </a>
                            </div>
                            {{-- @if(isset($tasks)) --}}
                            @foreach ($tasks as $task)
                            <div class="addTask">
                            <a href="/tasks/{{$task->id}}">
                                        <div class="add">
                                           <p>
                                               {{$task->task_title}}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection