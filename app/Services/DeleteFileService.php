<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class DeleteFileService
{
    /**
     * Delete local file
     *
     * @param $path_to_file
     * @return string[]
     */
    public function deleteLocalFile($path_to_file)
    {
        // Don't delete default image
        if (!$path_to_file
            || $path_to_file === 'avatars/default-avatar.jpeg'
            || $path_to_file === 'profile-banners/default-profile-banner.jpg') {
            return [
                'type' => 'warning',
                'message' => 'Invalid file path'
            ];
        }

        if (Storage::exists($path_to_file)) {
            Storage::delete($path_to_file);
            $response = [
                'type' => 'success',
                'message' => 'File successfully deleted'
            ];
        } else {
            $response = [
                'type' => 'error',
                'message' => 'File not found'
            ];
        }
        return $response;
    }
}
