<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helper\Helper; // Import the Helper class

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users.list', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // 'role_id' => 'required',
            'status' => 'required',
        ]);

        // Handle file upload for image
        $imageName = null;

         // Handle file upload for image
         if ($request->hasFile('image')) {
            $imageName = Helper::upload_video($request, 'image', 'users/profile');
        }

        // Create user
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'role_id' => $request->role_id,
            'role_id' => 2,
            'status' => $request->status,
            'image' => $imageName,
        ]);

        return redirect()->route('users.index')->with('green', 'User added successfully!');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified user in the database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // 'role_id' => 'required',
            'status' => 'required',
        ]);

        $user = User::findOrFail($id);

         // Handle file upload for image
         if ($request->hasFile('image')) {
            $image = Helper::upload_video($request, 'image', 'users/profile');
            $user->image = $image; // Store the new video path
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        // $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('users.index')->with('green', 'User updated successfully!');
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('green', 'User deleted successfully!');
    }
}
