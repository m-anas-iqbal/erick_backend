<?php

namespace App\Http\Controllers;

use App\Models\PdfFeed;
use Illuminate\Http\Request;
use App\Helper\Helper; // Import the Helper class

class PdfFeedController extends Controller
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
        $pdf = PdfFeed::all();
        return view('admin.pages.pdf.list', compact('pdf'));
    }

    /**
     * Show the form for creating a new feed.
     */
    public function create()
    {
        return view('admin.pages.pdf.add');
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
            'pdf' => 'required|file|mimetypes:application/pdf', // PDF is optional
            // 'extra' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        // Handle video upload
        if ($request->hasFile('pdf')) {
            $videoPath = Helper::upload_video($request, 'pdf', 'feeds/pdf');
            $validated['pdf'] = $videoPath; // Store the video path in the validated data
        }
        PdfFeed::create($validated);

        return redirect()->route('pdf.index')->with('green', 'PDF added successfully!');
    }

    /**
     * Show the form for editing the specified feed.
     */
    public function edit($id)
    {
        $pdf = PdfFeed::findOrFail($id);
        return view('admin.pages.pdf.edit', compact('pdf'));
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
          'pdf' => 'nullable|file|mimetypes:application/pdf', // PDF is optional
            // 'extra' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Handle the video upload
        if ($request->hasFile('pdf')) {
            $videoPath = Helper::upload_video($request, 'pdf', 'feeds/pdf');
            $validated['pdf'] = $videoPath; // Store the new video path
        }

        $pdf = PdfFeed::findOrFail($id);
        $pdf->update($validated);

        return redirect()->route('pdf.index')->with('green', 'PDF updated successfully!');
    }

    /**
     * Remove the specified feed from the database.
     */
    public function destroy($id)
    {
        $pdf = PdfFeed::findOrFail($id);
        $pdf->delete();

        return redirect()->route('pdf.index')->with('green', 'PDF deleted successfully!');
    }
}
