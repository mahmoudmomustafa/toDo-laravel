@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="content">
        {{-- show tasks --}}
        <div class="row justify-content-center show-task">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your Tasks</div>

                    <div class="card-body">
                        show tasks
                    </div>
                </div>
            </div>
        </div>
        {{-- add tasks --}}
        <div class="row justify-content-center add-task">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add New Task</div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">
                            <a href="/tasks">ADD</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection