@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="shadow-sm card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>{{ $task->name }}</h1>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $task->description }}</p>
                <p><strong>Category:</strong> {{ $task->category->name }}</p>
                <p><strong>Completed:</strong> {{ $task->completed ? 'Yes' : 'No' }}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
