<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;

class FeedController extends Controller
{
    public function create()
    {
        return view('feeds.create');
    }

    // Store the new feed in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,mov,avi,ogg,qt|max:200000', // Max 20MB
            'description' => 'required|string',
        ]);

        // Handle the video upload
        if ($request->hasFile('video')) {
            $videoPath = Helper::uploadVideo($request->file('video'),"video");
        }

        // Create the feed record
        $feed = Feed::create([
            'title' => $request->title,
            'video' => $videoPath, // Save the video path
            'description' => $request->description,
        ]);

        return redirect()->route('feeds.create')->with('success', 'Feed created successfully!');
    }
}
