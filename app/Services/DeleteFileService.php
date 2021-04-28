<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class DeleteFileService
{
    public function deleteLocalFile($path_to_file)
    {
        // Don't delete default image
        if (!$path_to_file
            || $path_to_file === 'storage/avatars/default-avatar.jpeg'
            || $path_to_file === 'storage/profile-banners/default-profile-banner.jpg') {
            return back()->with('warning', 'Invalid file path.');
        }
        $path_to_file = str_replace('storage/', '', $path_to_file);

        if (Storage::exists($path_to_file)) {
            Storage::delete($path_to_file);
        } else {
            return back()->with('error', 'File not found.');
        }
    }
}
