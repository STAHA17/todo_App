@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
                <h2>
                    <span class="rotate-symbol">🔄</span>Edit Task
                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $task->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $task->description }}</textarea>
                </div>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="completed" id="completed" class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
                <label for="completed" class="form-check-label">Completed</label>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Priority:</strong>
                    <select name="priority" class="form-control">
                        <option value="0">Low</option>
                        <option value="1">Medium</option>
                        <option value="2">High</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Due Date:</strong>
                    <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control" {{ $task->due_date }}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reminder:</strong>
                    <input type="datetime-local" name="reminder" value="{{ $task->reminder }}" class="form-control">
                </div>
            </div>

            <!-- New field add -->

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
