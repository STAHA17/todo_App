<!-- resources/views/tasks/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>
                    <span class="rotate-symbol">🔄</span> Tasks Details
                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tasks.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $task->title }}
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                {{ $task->description }}
            </div>
            <div class="form-group">
                <strong>Completed:</strong>
                {{ $task->completed ? 'Yes' : 'No' }}
            </div>
            <div class="form-group">
                <strong>Priority:</strong>
                {{ $task->priority == 2 ? 'High' : ($task->priority == 1 ? 'Medium' : 'Low') }}
            </div>
            <div class="form-group">
                <strong>Due Date:</strong>
                {{ $task->due_date }}
            </div>
            <div class="form-group">
                <strong>Reminder:</strong>
                {{ $task->reminder }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Subtasks</h2>
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

    <form action="{{ route('tasks.subtasks.store', $task->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subtask Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Subtask Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add Subtask</button>
            </div>
        </div>
    </form>

    @if ($task->subtasks->count())
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Completed</th>
                    <th width="280px">Action</th>
                </tr>
                @php $i = 0; @endphp
                @foreach ($task->subtasks as $subtask)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $subtask->title }}</td>
                        <td>{{ $subtask->completed ? 'Yes' : 'No' }}</td>
                        <td>
                            <form action="{{ route('tasks.subtasks.destroy', [$task->id, $subtask->id]) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('tasks.subtasks.edit', [$task->id, $subtask->id]) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endif
@endsection
