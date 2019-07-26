@extends('layouts.app')
@section('content')
<div class="col-lg-6 mx-4">
  {{-- show task --}}
  <div class="card mt-2">
    <h4 class="p-4 font-weight-bold" style="color: #5E52F6">{{ $task->task_title }}</h4>
    <div class="card-body">
      <div class="task descriton">
        <h4>Description</h4>
        <p>
          {{$task->description}}
        </p>
      </div>
      <div class="change">
        <form method="POST" action="/tasks/{{$task->id}}">
          @method('PATCH') @csrf
          <div class="form-check2">
            <input type="checkbox" name="done" id="check1" onchange="this.form.submit()"
              {{$task->done ? 'checked' : ''}}>
            <label for="check1"><i class="fa fa-check"></i></label>
          </div>
        </form>
        <div class="edit">
          <a href="/tasks/{{$task->id}}/edit">
            <button class="btn btn-success">edit</button>
          </a>
        </div>
        <div class="delete">
          <form action="/tasks/{{$task->id}}" method="POST">
            @method('DELETE') @csrf
            <button class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection