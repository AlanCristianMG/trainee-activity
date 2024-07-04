@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="flex-wrap mb-4 d-flex justify-content-between align-items-center">
        <h1 class="h2">Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="mt-2 btn btn-primary mt-md-0">
            <i class="fas fa-plus"></i> New Task
        </a>
    </div>

    <form id="search-form" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="search">Search</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search by name">
            </div>
            <div class="col-md-2">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" class="form-control" placeholder="Search by category">
            </div>
            <div class="col-md-2">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>
            <div class="col-md-1">
                <button type="button" id="search-button" class="mt-4 btn btn-primary w-100"><i class="fas fa-search"></i></button>
            </div>
            <div class="col-md-2">
                <button type="button" id="clear-button" class="mt-4 btn btn-secondary w-100">Clear filters</button>
            </div>
        </div>
    </form>
    
    <div class="shadow-sm card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="tasks-table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Completed</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tasks-tbody">
                    </tbody>
                </table>
                <div id="no-tasks-message" class="my-4 text-center text-muted" style="display: none;">
                    Tasks not found
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        fetchTasks();

        $('#search-button').on('click', function() {
            fetchTasks();
        });

        $('#clear-button').on('click', function() {
            clearFilters();
        });

        $('#search, #category, #start_date, #end_date').on('input', function() {
            fetchTasks();
        });

        function fetchTasks() {
            let search = $('#search').val();
            let category = $('#category').val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();

            $.ajax({
                url: '{{ route("tasks.index") }}',
                type: 'GET',
                data: {
                    search: search,
                    category: category,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(data) {
                    let tbody = '';
                    if (data.length > 0) {
                        data.forEach(function(task) {
                            let completed = task.completed ? 
                                '<span class="badge bg-success"><i class="fas fa-check"></i> Yes</span>' : 
                                '<span class="badge bg-warning"><i class="fas fa-times"></i> No</span>';
                            
                            tbody += `
                                <tr>
                                    <td>${task.name}</td>
                                    <td>${task.description}</td>
                                    <td><span class="badge bg-success">${task.category.name}</span></td>
                                    <td>${completed}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/tasks/${task.id}" class="btn btn-sm btn-outline-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/tasks/${task.id}/edit" class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="/tasks/${task.id}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this task?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#tasks-tbody').html(tbody);
                        $('#no-tasks-message').hide();
                    } else {
                        $('#tasks-tbody').html('');
                        $('#no-tasks-message').show();
                    }
                }
            });
        }

        function clearFilters() {
            $('#search').val('');
            $('#category').val('');
            $('#start_date').val('');
            $('#end_date').val('');
            fetchTasks();
        }
    });
</script>
@endsection
