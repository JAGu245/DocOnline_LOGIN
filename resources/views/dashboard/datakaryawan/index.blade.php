@extends('dashboard.dashboard')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Data Karyawan</h2>

        <!-- Form Pencarian berdasarkan NIK -->
        <form method="GET" action="{{ route('datakaryawan.index') }}" class="mb-6">
            <div class="flex space-x-4 mb-4">
                <div class="w-1/2">
                    <label for="nik" class="block text-sm font-medium text-gray-700">Cari Karyawan (NIK):</label>
                    <input type="text" name="nik" id="nik" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan NIK" value="{{ request()->get('nik') }}">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Cari</button>
                </div>
            </div>
        </form>

        <!-- Tombol Tambah Karyawan -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('datakaryawan.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Tambah Karyawan</a>
        </div>

        <!-- Tabel Karyawan -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pangkat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dealer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi HO</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($datakaryawans as $karyawan)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $karyawan->nik }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $karyawan->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $karyawan->pangkat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $karyawan->divisi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $karyawan->dealer }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $karyawan->posisi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $karyawan->divisiho }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('datakaryawan.edit', $karyawan->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                <span class="mx-2">|</span>
                                <a href="{{ route('datakaryawan.transferToUser', $karyawan->nik) }}" class="text-green-600 hover:text-green-800">Jadikan User</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
