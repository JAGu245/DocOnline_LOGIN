@extends('dashboard.dashboard')

@section('content')
    <div class="container">
        <h2>Data Karyawan</h2>

        <!-- Form Pencarian berdasarkan NIK -->
        <form method="GET" action="{{ route('datakaryawan.index') }}">
            <div class="form-group">
                <label for="nik">Cari Karyawan (NIK):</label>
                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK" value="{{ request()->get('nik') }}">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <hr>

        <!-- Tabel Karyawan -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Pangkat</th>
                    <th>Divisi</th>
                    <th>Dealer</th>
                    <th>Posisi</th>
                    <th>DivisiHO</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datakaryawans as $karyawan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawan->nik }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->pangkat }}</td>
                        <td>{{ $karyawan->divisi }}</td>
                        <td>{{ $karyawan->dealer }}</td>
                        <td>{{ $karyawan->posisi }}</td>
                        <td>{{ $karyawan->divisiho }}</td>
                        <td>
                            <a href="{{ route('datakaryawan.edit', $karyawan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <!-- Tombol untuk menjadikan karyawan ini sebagai user -->
                            <a href="{{ route('datakaryawan.transferToUser', $karyawan->nik) }}" class="btn btn-success btn-sm">
                                Jadikan User
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
