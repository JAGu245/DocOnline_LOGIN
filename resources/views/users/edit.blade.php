@extends('dashboard.dashboard')

<!-- Tambahkan Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    @csrf
    @method('PUT')

    <!-- Input NIK -->
    <div class="mb-4">
        <label for="nik" class="block text-gray-700 font-semibold mb-2">NIK</label>
        <input type="text" name="nik" id="nik" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" value="{{ $user->nik }}" required>
    </div>

    <!-- Input Nama -->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
        <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" value="{{ $user->name }}" required>
    </div>

    <!-- Input Password -->
    <div class="mb-4">
        <label for="password" class="block text-gray-700 font-semibold mb-2">Password (Biarkan kosong jika tidak ingin mengubah)</label>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
    </div>

    <!-- Tombol Update -->
    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg">Update</button>
</form>
@endsection
