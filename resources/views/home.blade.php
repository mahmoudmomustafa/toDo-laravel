@extends('layouts.app')
@section('content')
<div class="col-lg-6 mx-4">
    <div class=" mt-2">
        <h2 class="shows p-4 font-weight-bold" style="color: #5b6f82">{{ __('Welcome Back ') }}
            '<span>{{ Auth::user()->firstName()}}</span>'</h2>
        <div class="card-body home">
            <h3 class="p-4 font-weight-bold float-left" style="color: #5E52F6">Make Your Lists Now</h3>
            <a href="/tasks">
                <button class="btn btn-success">Add New Task</button>
              </a>
            <img class="float-right" src="/img/homePic.jpeg" height="325">
        </div>
    </div>
</div>
@endsection