@extends('dashboard.dashboard')
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar User</h1>

<!-- Form Pencarian -->
<form action="{{ route('users.index') }}" method="GET" class="mb-4">
    <div class="flex items-center">
        <input type="text" name="search" placeholder="Cari berdasarkan NIK atau Nama"
               class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:border-blue-500"
               value="{{ request('search') }}">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-r-lg">Cari</button>
    </div>
</form>

<!-- Tabel Daftar User -->
<div class="overflow-x-auto bg-white shadow rounded-lg mt-4">
    <table class="min-w-full table-auto divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">NIK</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($users as $index => $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->nik }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->role->name ?? 'Tidak ada' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <span>|</span>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data user ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
