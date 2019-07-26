@extends('layouts.app') 
@section('content')
<div class="col-lg-8">
  <div class="content">
    {{-- show tasks --}}
    <div class="row justify-content-center m-2 show-task">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="m-0">
              {{$task->task_title}}
            </h3>
            <div class="check">
              <form method="POST" action="/tasks/{{$task->id}}">
                @method('PATCH') @csrf
                <label for="done">
                     <input type="checkbox" name="done" onchange="this.form.submit()" {{$task->done ? 'checked' : ''}}>
                     Done
                  </label>
              </form>
            </div>
            </form>
          </div>
          <div class="card-body">
            <div class="task descriton">
              <h4>Description</h4>
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