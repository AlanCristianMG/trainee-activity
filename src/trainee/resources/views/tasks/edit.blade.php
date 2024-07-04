@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="shadow-sm card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Edit Task</h1>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 form-group">
                        <label for="name">Task Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $task->name }}" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="completed" class="form-check-input" id="completed" {{ $task->completed ? 'checked' : '' }}>
                        <label class="form-check-label" for="completed">Completed</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
