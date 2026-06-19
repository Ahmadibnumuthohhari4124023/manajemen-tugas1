@extends('layouts.app')

@section('content')
    <a href="{{ route('tasks.create') }}"
       class="inline-block bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700">
        + Tambah Tugas
    </a>

    <div class="bg-white rounded shadow divide-y">
        @forelse ($tasks as $task)
            <div class="p-4 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-gray-800">{{ $task->title }}</p>
                    <p class="text-sm text-gray-500">{{ $task->description }}</p>
                    <span class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-600">
                        {{ $task->status }}
                    </span>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('tasks.edit', $task) }}"
                       class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                          onsubmit="return confirm('Hapus tugas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="p-4 text-gray-500">Belum ada tugas.</p>
        @endforelse
    </div>
@endsection
