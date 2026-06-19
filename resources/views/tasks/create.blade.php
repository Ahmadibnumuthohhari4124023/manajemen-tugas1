@extends('layouts.app')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="mt-1 w-full border rounded px-3 py-2">
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" class="mt-1 w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="mt-1 w-full border rounded px-3 py-2">
                <option value="pending">Pending</option>
                <option value="in_progress">Sedang dikerjakan</option>
                <option value="done">Selesai</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
        <a href="{{ route('tasks.index') }}" class="text-gray-500 ml-2">Batal</a>
    </form>
@endsection
