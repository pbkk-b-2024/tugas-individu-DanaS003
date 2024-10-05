<?php

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        // Disk default
        Storage::put('uploads/file.txt', 'This is a test file');

        // Disk S3
        Storage::disk('s3')->put('uploads/file.txt', 'This is a test file on S3');

        // Disk On-Demand
        Storage::build([
            'driver' => 'local',
            'root' => '/custom/path/to/root',
        ])->put('uploads/file.txt', 'This is a test file with on-demand disk');
        
        return response()->json(['message' => 'File uploaded successfully']);
    }
}
