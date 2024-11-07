@extends('dashboard.dashboard') <!-- Menggunakan layout utama dashboard -->

@section('content')
<h1>Data Karyawan</h1>
<a href="{{ route('datakaryawan.create') }}" class="btn btn-primary mb-3">Tambah Data Karyawan</a>

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
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Unggah File PDF</label>
            <input type="file" name="file" id="file" class="form-control" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">Unggah</button>
    </form>

    <hr>

    <!-- Daftar File yang Diunggah -->
    <h2>Daftar File</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($files as $index => $file)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $file->name }}</td>
                    <td>
                        <a href="{{ route('file.download', $file->id) }}" class="btn btn-success btn-sm">Unduh</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
