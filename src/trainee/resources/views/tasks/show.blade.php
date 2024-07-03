@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $task->name }}</h1>
        <p>{{ $task->description }}</p>
        <p>Category: {{ $task->category->name }}</p>
        <p>Completed: {{ $task->completed ? 'Yes' : 'No' }}</p>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
