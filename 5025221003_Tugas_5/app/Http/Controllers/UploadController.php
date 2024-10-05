<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'image' => 'required|file|max:2048|mimes:jpg,png,pdf',
        ]);

        // Simpan file ke direktori 'public/images'
        $path = $request->file('image')->store('images', 'public');

        // Simpan informasi file ke database (asumsi Anda memiliki model File)
        $file = new File();
        $file->filename = $request->file('image')->getClientOriginalName();
        $file->filepath = $path;
        $file->filetype = $request->file('image')->getMimeType();
        $file->filesize = $request->file('image')->getSize();
        $file->save();

        // Ambil semua file dari database
        $files = File::all();

        // Kembalikan ke view 'upload' dengan variabel 'files'
        return view('upload', ['files' => $files])->with('path', $path);
    }

    public function showUploadForm()
    {
        // Ambil semua file dari database untuk ditampilkan di tabel
        $files = File::all();

        // Kembalikan view 'upload' dengan data file
        return view('upload', ['files' => $files]);
    }
}
