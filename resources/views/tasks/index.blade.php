@extends('layouts.app')
@section('content')
{{-- add tasks --}}
<div class="col-lg-6 mx-4">
  <div class="card mt-2">
    <h4 class="p-4 font-weight-bold" style="color: #5E52F6">{{ __('Add New Task') }}</h4>
    {{-- card body --}}
    <div class="card-body">
      {{-- form --}}
      <form action="/tasks" method="post">
        @csrf
        <div class="form-group">
          <label for="title" class="font-weight-bold" style="color: #5b6f82;">Title</label>
          <input class="form-control {{ $errors->has('task_title') ? ' is-invalid' : '' }}" type="text"
            name="task_title" id="title" placeholder="Task Title">
          @if($errors->has('task_title'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('task_title') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group ">
          <label class="font-weight-bold" style="color: #5b6f82;" for="description">Description</label>
          <textarea placeholder="Task Description"
            class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description"
            rows="3"></textarea>
            @if($errors->has('description'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
          <button style="width:100%" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection