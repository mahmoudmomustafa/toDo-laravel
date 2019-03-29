@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="content">
    {{-- show tasks --}}
    <div class="row justify-content-center m-2 show-task">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Your Tasks</div>

          <div class="card-body">
            <div class="task title">
              <h3>Title :</h3>
              <p>
                {{$task->task_title}}
              </p>
            </div>
            <div class="task descriton">
              <h3>Description :</h3>
              <p>
                {{$task->description}}
              </p>
            </div>
            <div class="change">
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
    </div>
  </div>
</div>
@endsection