<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // READ (list semua data)
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // CREATE (form tambah)
    public function create()
    {
        return view('tasks.create');
    }

    // CREATE (simpan data baru)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    // UPDATE (form edit)
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // UPDATE (simpan perubahan)
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
