@extends('dashboard.dashboard')

@section('content')
    <h1>Dashboard</h1>

    <!-- Form untuk Unggah File -->
    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
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
                    <td>{{ preg_replace('/^\d+_/', '', $file->PublishDoc) }}</td>
                    <td>
                        <a href="{{ route('file.download', $file->id) }}" class="btn btn-success btn-sm">Unduh</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
