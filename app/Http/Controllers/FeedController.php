<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use Illuminate\Http\Request;
use App\Helper\Helper; // Import the Helper class

class FeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the feeds.
     */
    public function index()
    {
        $feeds = Feeds::all();
        return view('admin.pages.feeds.list', compact('feeds'));
    }

    /**
     * Show the form for creating a new feed.
     */
    public function create()
    {
        return view('admin.pages.feeds.add');
    }

    /**
     * Store a newly created feed in the database.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // Validate the request, making video required and other fields nullable
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'status' => 'nullable|string',
            'video' => 'required|file|mimetypes:video/mp4,video/x-msvideo,video/x-matroska', // Video is required
            // 'extra' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        // Handle video upload
        if ($request->hasFile('video')) {
            $videoPath = Helper::upload_video($request, 'video', 'feeds/videos');
            $validated['video'] = $videoPath; // Store the video path in the validated data
        }
        Feeds::create($validated);

        return redirect()->route('feeds.index')->with('green', 'Feed added successfully!');
    }

    /**
     * Show the form for editing the specified feed.
     */
    public function edit($id)
    {
        $feed = Feeds::findOrFail($id);
        return view('admin.pages.feeds.edit', compact('feed'));
    }

    /**
     * Update the specified feed in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the request, making video required and other fields nullable
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'status' => 'nullable|string',
            // 'video' => 'required|file|mimetypes:video/mp4,video/x-msvideo,video/x-matroska', // Video is required
            // 'extra' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Handle the video upload
        if ($request->hasFile('video')) {
            $videoPath = Helper::upload_video($request, 'video', 'feeds/videos');
            $validated['video'] = $videoPath; // Store the new video path
        }

        $feed = Feeds::findOrFail($id);
        $feed->update($validated);

        return redirect()->route('feeds.index')->with('green', 'Feed updated successfully!');
    }

    /**
     * Remove the specified feed from the database.
     */
    public function destroy($id)
    {
        $feed = Feeds::findOrFail($id);
        $feed->delete();

        return redirect()->route('feeds.index')->with('green', 'Feed deleted successfully!');
    }
}
