@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h1 class="h2">Tareas</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva Tarea
        </a>
    </div>
    
    <div class="shadow-sm card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Completada</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ Str::limit($task->description, 50) }}</td>
                            <td>
                                <span class="badge bg-success">{{ $task->category->name }}</span>
                            </td>
                            <td>
                                @if($task->completed)
                                    <span class="badge bg-success"><i class="fas fa-check"></i> Sí</span>
                                @else
                                    <span class="badge bg-warning"><i class="fas fa-times"></i> No</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-info" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection