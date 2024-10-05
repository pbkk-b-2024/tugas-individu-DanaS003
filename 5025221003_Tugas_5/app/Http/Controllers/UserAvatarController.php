<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    /**
     * Update the avatar for the user.
     */
    public function update(Request $request): string
    {
        // Menyimpan file avatar ke direktori 'avatars'
        $path = $request->file('avatar')->store('avatars');
        
        // Mengembalikan path file yang di-upload
        return $path;
    }
}
