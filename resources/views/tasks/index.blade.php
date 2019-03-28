@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="content">
      {{-- add tasks --}}
      <div class="row justify-content-center m-2 add-task">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Add New Task</div>
            <div class="card-body">
              {{-- form --}}
            <form action="/tasks" method="post">
                @csrf
                <div class="form-group">
                  <input class="form-control" type="text" name="task_title" id="title" placeholder="Title">
                </div>
                <div class="form-group">
                  <textarea placeholder="Description" class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <button style="width:100%" type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- show tasks --}}
      <div class="row justify-content-center m-2 show-task">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Your Tasks</div>

                  <div class="card-body">
                      @foreach ($tasks as $task)
                      <a href="/tasks/{{$task->id}}">
                        <div class="list">
                            {{$task->task_title}}
                          </div>
                        </a> 
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection