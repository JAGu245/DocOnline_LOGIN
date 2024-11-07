@extends('dashboard.dashboard')

@section('content')
<h1>Tambah Data Karyawan</h1>
<form action="{{ route('datakaryawan.store') }}" method="POST">
    @csrf
    <label>NIK:</label>
    <input type="text" name="nik" required><br>

    <label>Nama:</label>
    <input type="text" name="nama" required><br>

    <label>Pangkat:</label>
    <input type="text" name="pangkat" required><br>

    <label>Divisi:</label>
    <input type="text" name="divisi" required><br>

    <label>Dealer:</label>
    <input type="text" name="dealer" required><br>

    <label>Posisi:</label>
    <input type="text" name="posisi" required><br>

    <label>Divisi HO:</label>
    <input type="text" name="divisiho" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
