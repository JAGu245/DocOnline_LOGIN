<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::where('user_id', auth()->id())->get(); // Menampilkan file milik user login

        $countFiles = File::count();

        return view('dashboard.files.index', compact('files', 'countFiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        File::create([
            'PublishDoc' => $fileName,
            'file_path' => '/storage/' . $filePath,
            'user_id' => auth()->id(), // Menyimpan ID pengguna yang login
        ]);

        return redirect()->route('files.index')->with('success', 'File berhasil diupload.');
    }

    public function download($id)
    {
        $file = File::findOrFail($id);
        $filePath = 'public/uploads/' . $file->PublishDoc;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath, $file->PublishDoc);
        } else {
            return redirect()->route('files.index')->with('error', 'File tidak ditemukan.');
        }
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        File::create([
            'PublishDoc' => $fileName,
            'file_path' => '/storage/' . $filePath,
            'user_id' => auth()->id(), // Menyimpan ID pengguna yang login
        ]);

        return redirect()->route('files.index')->with('success', 'File berhasil diupload.');
    }
}
