@extends('layouts.app')
@section('content')
<div class="col-lg-6 mx-4">
  {{-- edit task --}}
  <div class="card mt-2">
    <h4 class="p-4 font-weight-bold" style="color: #5E52F6">{{ __('Edit Task') }}</h4>
    <div class="card-body">
      {{-- form --}}
      <form action="/tasks/{{$task->id}}" method="post">
        @csrf @method('PATCH')
        <div class="form-group">
          <label for="titel">Title :</label>
          <input class="form-control {{ $errors->has('task_title') ? ' is-invalid' : '' }}" type="text"
            name="task_title" id="title" placeholder="Title" value="{{$task->task_title}}">
          @if($errors->has('task_title'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('task_title') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea placeholder="Description"
            class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
            id="description" rows="3">{{$task->description}}</textarea>
          @if($errors->has('description'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group">
          <button style="width:100%" type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection