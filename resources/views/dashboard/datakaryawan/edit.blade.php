@extends('dashboard.dashboard')

@section('content')
<h1>Edit Data Karyawan</h1>
<form action="{{ route('datakaryawan.update', $datakaryawan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>NIK:</label>
    <input type="text" name="nik" value="{{ $datakaryawan->nik }}" required><br>

    <label>Nama:</label>
    <input type="text" name="nama" value="{{ $datakaryawan->nama }}" required><br>

    <label>Pangkat:</label>
    <input type="text" name="pangkat" value="{{ $datakaryawan->pangkat }}" required><br>

    <label>Divisi:</label>
    <input type="text" name="divisi" value="{{ $datakaryawan->divisi }}" required><br>

    <label>Dealer:</label>
    <input type="text" name="dealer" value="{{ $datakaryawan->dealer }}" required><br>

    <label>Posisi:</label>
    <input type="text" name="posisi" value="{{ $datakaryawan->posisi }}" required><br>

    <label>Divisi HO:</label>
    <input type="text" name="divisiho" value="{{ $datakaryawan->divisiho }}" required><br>

    <label>Password:</label>
    <input type="password" name="password"><br>


    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
