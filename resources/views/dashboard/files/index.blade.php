@extends('dashboard.dashboard')

<script src="https://cdn.tailwindcss.com"></script>

@section('content')
    <div class="container mx-auto p-6">
        <!-- Form untuk Unggah File -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-medium mb-4">Unggah File PDF</h2>
            <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">Pilih File PDF</label>
                    <input type="file" name="file" id="file" class="w-full p-2 border border-gray-300 rounded-md" accept="application/pdf" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Unggah</button>
            </form>
        </div>

        <hr class="my-8">

        <!-- Daftar File yang Diunggah -->
        <h2 class="text-2xl font-medium mb-4">Daftar File</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left text-gray-800">No</th>
                    <th class="py-3 px-6 text-left text-gray-800">Nama File</th>
                    <th class="py-3 px-6 text-left text-gray-800">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($files as $index => $file)
                    <tr class="border-b border-gray-200">
                        <td class="py-3 px-6 text-gray-800">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 text-gray-500">{{ preg_replace('/^\d+_/', '', $file->PublishDoc) }}</td>
                        <td class="py-3 px-6 text-gray-350">
                            <a href="{{ route('file.download', $file->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Unduh</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
