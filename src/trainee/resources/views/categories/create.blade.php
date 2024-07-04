@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="shadow card">
                    <div class="text-white card-header bg-gradient" style="background-color: #4e73df;">
                        <h1 class="mb-0 text-center">
                            <i class="fas fa-folder-plus me-2"></i> Create New Category
                        </h1>
                    </div>
                    <div class="p-4 card-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-tag me-2"></i> Category Name
                                </label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="gap-2 d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i> Create
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-times me-2"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
