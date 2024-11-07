@extends('dashboard.dashboard')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Data Karyawan</h1>

        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <form action="{{ route('datakaryawan.update', $datakaryawan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- NIK -->
                <div class="mb-4">
                    <label for="nik" class="block text-gray-700">NIK:</label>
                    <input type="text" name="nik" value="{{ $datakaryawan->nik }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama:</label>
                    <input type="text" name="nama" value="{{ $datakaryawan->nama }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Pangkat -->
                <div class="mb-4">
                    <label for="pangkat" class="block text-gray-700">Pangkat:</label>
                    <input type="text" name="pangkat" value="{{ $datakaryawan->pangkat }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Divisi -->
                <div class="mb-4">
                    <label for="divisi" class="block text-gray-700">Divisi:</label>
                    <input type="text" name="divisi" value="{{ $datakaryawan->divisi }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Dealer -->
                <div class="mb-4">
                    <label for="dealer" class="block text-gray-700">Dealer:</label>
                    <input type="text" name="dealer" value="{{ $datakaryawan->dealer }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Posisi -->
                <div class="mb-4">
                    <label for="posisi" class="block text-gray-700">Posisi:</label>
                    <input type="text" name="posisi" value="{{ $datakaryawan->posisi }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Divisi HO -->
                <div class="mb-4">
                    <label for="divisiho" class="block text-gray-700">Divisi HO:</label>
                    <input type="text" name="divisiho" value="{{ $datakaryawan->divisiho }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" name="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
