<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tasks = Task::with('category');

            if ($request->search) {
                $tasks->where('name', 'like', '%' . $request->search . '%');
            }

            if ($request->start_date && $request->end_date) {
                $tasks->whereBetween('created_at', [$request->start_date, $request->end_date]);
            }

            $tasks = $tasks->get();

            return response()->json($tasks);
        }

        $tasks = Task::with('category')->get();
        return view('tasks.index', compact('tasks'));
    }          

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
    
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->category_id = $request->input('category_id');
        $task->completed = $request->has('completed');
    
        $task->save();
    
        return redirect()->route('tasks.index');
    }
    

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
