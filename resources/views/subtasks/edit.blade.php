@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Subtask') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('subtasks.update', ['taskId' => $subtask->task_id, 'subtaskId' => $subtask->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $subtask->title }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add Completed Field -->
                            <div class="form-group row">
                                <label for="completed" class="col-md-4 col-form-label text-md-right">{{ __('Completed') }}</label>
                                <div class="col-md-6">
                                <input id="completed" type="checkbox" class="form-check-input" name="completed" {{ $subtask->completed ? 'checked' : '' }} value="1">
                                </div>
                            </div>
                            <!-- End of Completed Field -->

                            <!-- Other fields for editing subtask -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Subtask') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
