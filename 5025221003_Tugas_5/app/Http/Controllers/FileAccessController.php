<?php

use Illuminate\Support\Facades\Storage;

class FileAccessController extends Controller
{
    public function getFileUrl()
    {
        $url = Storage::url('file.jpg');
        return response()->json(['url' => $url]);
    }

    public function getTemporaryFileUrl()
    {
        $temporaryUrl = Storage::temporaryUrl('file.jpg', now()->addMinutes(5));
        return response()->json(['temporary_url' => $temporaryUrl]);
    }
}
