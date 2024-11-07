<?php
namespace App\Http\Controllers;

use App\Models\Datakaryawan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatakaryawanController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah ada parameter 'nik' dari form pencarian
        $query = Datakaryawan::query();

        if ($request->has('nik') && $request->nik != '') {
            $query->where('nik', 'like', '%' . $request->nik . '%');
        }

        // Ambil data karyawan sesuai pencarian
        $datakaryawans = $query->get();

        return view('dashboard.datakaryawan.index', compact('datakaryawans'));
    }

    public function create()
    {
        return view('dashboard.datakaryawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:datakaryawan',
            'nama' => 'required',
            'password' => 'required',
            // tambahkan validasi untuk field lain
        ]);

        $datakaryawan = Datakaryawan::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'pangkat' => $request->pangkat,
            'divisi' => $request->divisi,
            'dealer' => $request->dealer,
            'posisi' => $request->posisi,
            'divisiho' => $request->divisiho,
            'password' => Hash::make($request->password),
        ]);

        // Buat User dari Data Karyawan
        User::create([
            'name' => $request->nama,
            'nik' => $request->nik, // Bisa disesuaikan sesuai kebutuhan
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('datakaryawan.index');
    }

    public function edit(Datakaryawan $datakaryawan)
    {
        return view('dashboard.datakaryawan.edit', compact('datakaryawan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'nik' => 'required|unique:datakaryawan,nik,' . $id,
            'nama' => 'required',
            'pangkat' => 'required',
            'divisi' => 'required',
            'dealer' => 'required',
            'posisi' => 'required',
            'divisiho' => 'required',
            'password' => 'nullable|min:8', // Password opsional, hanya jika ingin mengubah
        ]);

        // Cari data karyawan berdasarkan ID
        $karyawan = Datakaryawan::findOrFail($id);
        // Update data di tabel datakaryawan
        $karyawan->update($validatedData);

        // Cari data user berdasarkan NIK yang sama
        $user = User::where('nik', $karyawan->nik)->first();

        if ($user) {
            // Update nama di tabel user
            $user->name = $karyawan->nama;

            // Jika ada password baru, enkripsi dan simpan
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            // Simpan perubahan di tabel users
            $user->save();
        }

        // Redirect ke halaman index setelah update
        return redirect()->route('datakaryawan.index')->with('success', 'Data karyawan dan user berhasil diperbarui.');
    }

    public function transferToUser($nik)
    {
        // Cari karyawan berdasarkan NIK
        $karyawan = Datakaryawan::where('nik', $nik)->firstOrFail();

        // Periksa apakah user dengan NIK yang sama sudah ada
        $user = User::firstOrNew(['nik' => $karyawan->nik]);

        // Transfer data karyawan ke tabel users
        $user->name = $karyawan->nama;
        $user->password = Hash::make($karyawan->nik); // Menggunakan NIK sebagai password
        $user->save();

        // Kembali ke halaman daftar karyawan dengan pesan sukses
        return redirect()->route('datakaryawan.index')->with('success', 'Karyawan berhasil dijadikan user.');
    }

    public function makeUser($id)
    {
        // Pastikan data karyawan ditemukan berdasarkan ID
        $karyawan = Datakaryawan::findOrFail($id);

        // Periksa apakah user dengan NIK yang sama sudah ada
        $user = User::firstOrNew(['nik' => $karyawan->nik]);

        // Transfer data karyawan ke tabel users
        $user->name = $karyawan->nama;
        $user->password = Hash::make($karyawan->nik); // Gunakan NIK sebagai password
        $user->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('datakaryawan.index')->with('success', 'Karyawan berhasil dijadikan user.');
    }

    public function fetchData(Request $request)
    {
        $query = Datakaryawan::query();

        // Filter berdasarkan NIK jika ada
        if ($request->has('nik') && !empty($request->nik)) {
            $query->where('nik', 'LIKE', '%' . $request->nik . '%');
        }

        $datakaryawans = $query->get();
        return response()->json($datakaryawans);
    }

}
