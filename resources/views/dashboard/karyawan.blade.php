@extends('dashboard.dashboard')

@section('content')
<h1>Data Karyawan</h1>
<a href="{{ route('datakaryawan.create') }}" class="btn btn-primary">Tambah Data Karyawan</a>

<table class="table">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Pangkat</th>
            <th>Divisi</th>
            <th>Dealer</th>
            <th>Posisi</th>
            <th>Divisi HO</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datakaryawan as $data)
        <tr>
            <td>{{ $data->nik }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->pangkat }}</td>
            <td>{{ $data->divisi }}</td>
            <td>{{ $data->dealer }}</td>
            <td>{{ $data->posisi }}</td>
            <td>{{ $data->divisiho }}</td>
            <td>
                <a href="{{ route('datakaryawan.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                <!-- tombol hapus jika diperlukan -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
