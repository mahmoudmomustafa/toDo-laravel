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
            <form action="/tasks/{{$task->id}}" method="post">
              @csrf @method('PATCH')
              <div class="form-group">
                <input class="form-control" type="text" name="task_title" id="title" placeholder="Title" value="{{$task->task_title}}">
              </div>
              <div class="form-group">
                <textarea placeholder="Description" class="form-control" name="description" id="description" rows="3">{{$task->description}}</textarea>
              </div>
              <div class="form-group">
                <button style="width:100%" type="submit" class="btn btn-primary">Confirm</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection