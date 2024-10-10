<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feeds;
use Illuminate\Support\Facades\Crypt;
use App\Helper\Helper; // Import the Helper class

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function clientDashboard()
    {
        $data['feeds'] =   $feeds = Feeds::paginate(10);
        return view('vendor.dashboard',$data);
    }
    public function adminDashboard()
    {
        return view('admin.pages.dashboard');
    }
        // profile_edit
    public function profile_edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $profile = User::find($dec_id);
        return view('profile', compact('profile'));
    }
    public function profile_edit_post(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email',
            'password'   => 'nullable|min:6', // Optional password
            'confirm_password' => 'nullable|same:password',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
        ]);

        // Decrypt the ID
        $dec_id = Crypt::decrypt($request->id);

        // Find the user by ID
        $edit = User::find($dec_id);

        $edit->first_name = $request->first_name;
        $edit->last_name = $request->last_name;
        $edit->email = $request->email;
        // Handle file upload for image
        if ($request->hasFile('image')) {
            $image = Helper::upload_video($request, 'image', 'users/profile');
            $edit->image = $image; // Store the new video path
        }
        // Check if password is provided and update it
        if ($request->filled('password')) {
            $edit->password = Hash::make($req->password);
        }

        // Save the changes
        $edit->update();

        // Flash a success message
        session()->flash('success', 'Profile Updated Successfully');

        // Redirect to the profile page
        return redirect('profile/edit/'.$request->id);
    }

}
