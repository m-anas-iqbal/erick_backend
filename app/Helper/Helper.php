<?php

namespace App\Helper;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Helper
{
    /**
     * Upload a video to the specified folder with a timestamp.
     *
     * @param UploadedFile $video
     * @param string $folder
     * @return string|null
     */
    function upload_video($request,$fieldName, $folder = 'feeds/videos')
    {
        ini_set('post_max_size', '20000M');
        ini_set('upload_max_filesize', '20000M');
        ini_set('max_execution_time', 20000); // in seconds
        if ($request->hasFile($fieldName)) {
            $video = $request->file($fieldName);

            // Get the original filename
            $originalName = $video->getClientOriginalName();

            // Remove spaces from the original filename
            $originalName = str_replace(' ', '_', $originalName); // Replace spaces with underscores


            // Get the file extension
            $extension = $video->getClientOriginalExtension();

            // Create a new filename with a timestamp
            $timestamp = now()->format('YmdHis'); // Format: YYYYMMDDHHMMSS
            $newFileName = pathinfo($originalName, PATHINFO_FILENAME) . "_{$timestamp}." . $extension;

            // Store the video in the public storage under the specified folder
            return $video->storeAs($folder, $newFileName, 'public');
        }
        return null;
    }
}
