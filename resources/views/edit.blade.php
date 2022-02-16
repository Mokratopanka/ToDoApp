@extends('index')

@section('main-content')

    <div class="container p-5">
        <div class="float-start">
            <h4 class="pb-3">Edit Task <span class="badge bg-info">{{$task->title}}</span></h4>
        </div>
        <div class="float-end">
            <a href="/tasks" class="btn btn-info">
                All Tasks
            </a>
        </div>
        <div class="clearfix"></div>
  
     
        <div class="card card-body bg-primary p-3">
        <form action="{{route('tasks.update', $task->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="5">{{$task->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    @foreach ($statuses as $status)
                        <option value="{{ $status['value'] }}" {{$task->status === $status['value'] ? 'selected' : ''}} >{{ $status['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Save</button>
        </form>
        </div>   
    

    
@endsection