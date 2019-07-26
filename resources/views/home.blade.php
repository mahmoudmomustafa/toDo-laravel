@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="content">
        {{-- show tasks --}}
        <div class="row justify-content-center show-task">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="font-weight-bold" style="color: #5E52F6">{{ __('Tasks asdasda ada sasda ') }}</h4>
                    </div>

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
            <div class="col-lg-3">
                <div class="card">
                    <h4 class="p-4 font-weight-bold" style="color: #5E52F6">{{ __('Tasks') }}<span
                            class="text-muted pl-1"><small>({{$tasks->count()}})</small></span></h4>
                    <div class="card-body pt-1">
                        <div class="tasks">
                            @foreach ($tasks as $task)
                            <div class="addTask">
                                <a class="font-weight-bold" href="/tasks/{{$task->id}}">
                                    <p>
                                        {{$task->task_title}}
                                    </p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection