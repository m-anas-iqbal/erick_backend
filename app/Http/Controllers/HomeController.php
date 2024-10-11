<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeds;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (auth()->check()) {
            switch (auth()->user()->role_id) {
                case 1:
                    return redirect()->route('dashboard'); // Admin dashboard
                case 2:
                    return redirect()->route('videos'); // Vendor dashboard
                default:
                    // return redirect()->route('login'); // Default to home if role is unknown
            }
        }
        return view('admin.auth.login');
    }
}
