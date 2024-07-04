@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>{{ $category->name }}</h2>
                        <a href="{{ URL::previous() }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Regresar
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nombre:</strong> {{ $category->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Creado:</strong> {{ $category->created_at->format('d/m/Y H:i:s') }}
                    </div>
                    <div class="mb-3">
                        <strong>Actualizado:</strong> {{ $category->updated_at->format('d/m/Y H:i:s') }}
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Botones de acción -->
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
