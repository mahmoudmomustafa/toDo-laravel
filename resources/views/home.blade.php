@extends('layouts.app')
@section('content')
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
                {{-- @foreach ($tasks as $task) --}}
                <div class="addTask">
                    {{-- <a href="/tasks/{{$task->id}}"> --}}
                    <div class="add">
                        <p>
                            {{-- {{$task->task_title}} --}}
                        </p>
                    </div>
                    </a>
                </div>
                {{-- @endforeach --}}
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>
@endsection