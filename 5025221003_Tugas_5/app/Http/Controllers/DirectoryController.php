<?php

use Illuminate\Support\Facades\Storage;

class DirectoryController extends Controller
{
    public function createDirectory()
    {
        Storage::makeDirectory('folder');
        return response()->json(['message' => 'Directory created successfully']);
    }

    public function deleteDirectory()
    {
        Storage::deleteDirectory('folder');
        return response()->json(['message' => 'Directory deleted successfully']);
    }
}
