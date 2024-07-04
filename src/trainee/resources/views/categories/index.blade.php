@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Categorías</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Crear Categoría
            </a>
        </div>
        <div class="shadow card">
            <div class="p-4 card-body">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm me-2">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
