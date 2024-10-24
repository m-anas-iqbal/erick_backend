<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feeds;
use App\Models\PdfFeed;
use App\Models\Qoutation;
use App\Models\Newsletter;
use App\Models\Contactus;
use App\Models\Partner;
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
        $data['feeds'] = Feeds::where('status',1)->paginate(10);
        return view('vendor.dashboard',$data);
    }
    public function pdf()
    {
        $data['pdf'] =   PdfFeed::where('status',1)->paginate(10);
        return view('vendor.pdfs',$data);
    }
    public function adminDashboard()
    {
        $data['feedsCount'] = Feeds::count();
        $data['partnerCount'] = Partner::count();
        $data['pdfCount'] =   PdfFeed::count();
        $data['userCount'] = User::where('role_id',2)->count();
        $data['contactCount'] = Contactus::count();
        $data['qoutationCount'] = Qoutation::count();
        $data['newsletterCount'] = Newsletter::count();
        return view('admin.pages.dashboard' ,$data);
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
            $edit->password = Hash::make($request->password);
        }

        // Save the changes
        $edit->update();

        // Flash a success message
        session()->flash('success', 'Profile Updated Successfully');

        // Redirect to the profile page
        return redirect('profile/edit/'.$request->id);
    }
    public function contact()
    {
        $contactus = Contactus::orderBy('id','desc')->get(); // Adjust pagination as needed
        return view('admin.pages.contact.list', compact('contactus'));
    }
    public function newsletter()
    {
        $newsletters = Newsletter::orderBy('id','desc')->get(); // Adjust pagination as needed
        return view('admin.pages.newsletter.list', compact('newsletters'));
    }
    public function qoutation()
    {
        $qoutations = Qoutation::orderBy('id','desc')->get(); // Adjust pagination as needed
        return view('admin.pages.qoutation.list', compact('qoutations'));
    }
    public function partner()
    {
        $partners = Partner::orderBy('id','desc')->get(); // Adjust pagination as needed
        return view('admin.pages.partner.list', compact('partners'));
    }
}
