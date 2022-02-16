@extends('index')

@section('main-content')

    <div class="container p-5">
        <div class="float-start">
            <h4 class="pb-3">My tasks</h4>
        </div>
        <div class="float-end">
            <a href="{{route('tasks.create')}}" class="btn btn-info">
                Create Task
            </a>
        </div>
        <div class="clearfix"></div>
  
        @foreach ($tasks as $task) 
        <div class="card bg-secondary">
            <div class="card-header">
                {{$task->title}}
                <span class="badge bg-info text-dark">{{$task->created_at->diffForHumans()}}</span>
            </div>
            <div class="card-body">
                <div class="card-text">
                            <div class="float-start">
                            {{$task->description}}
                            <br>
                            @if ($task->status === "Todo")
                            <span class="badge bg-warning text-white">Todo</span>
                            @else
                            <span class="badge bg-success text-white">Done</span>
                            @endif
                            <small>Last Updated - {{$task->updated_at->diffForHumans()}}</small>
                            </div>
                            <div class="float-end">
                                <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-success">
                                    Edit
                                </a>
                                <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-danger">
                                    Delete
                                </a>
                            </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
@endsection

