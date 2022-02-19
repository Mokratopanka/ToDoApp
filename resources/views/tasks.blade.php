@extends('index')

@section ('title', 'MyTasks')

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
            <h5 class="card-header">
                @if ($task->status === "Todo")
                    {{$task->title}}
                @else
                    <del>{{ $task->title}}</del>
                @endif
                <span class="badge bg-info text-dark">{{$task->created_at->diffForHumans()}}</span>
            </h5>
            <div class="card-body">
                <div class="card-text">
                            <div class="float-start">
                            @if ($task->status === "Todo")
                                {{$task->description}}
                            @else
                                <del>{{ $task->description}}</del>
                            @endif
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
                                <form action="{{ route('tasks.destroy', $task->id)}}" style="display: inline;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                                
                            </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
@endsection

