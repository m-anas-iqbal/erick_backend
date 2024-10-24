<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qoutation; // Make sure to import the Quote model
use App\Models\Newsletter; // Make sure to import the Quote model
use App\Models\Contactus; // Make sure to import the Quote model
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function qoutation(Request $request)
    {
        // Create a new quote
        $quote = Qoutation::create($request->all());

        // Return a success response
        return response()->json(['message' => 'Quote submitted successfully', 'data' => $quote], 200);
    }
    public function newsletter(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new newsletter subscription
        $newsletter = Newsletter::create($request->only('email'));

        // Return a success response
        return response()->json(['message' => 'Subscribed successfully!', 'data' => $newsletter], 200);
    }
    public function contact(Request $request)
    {
        // dd($request->all());
        // Create a new contact inquiry without validation
        $contactUs = ContactUs::create($request->all());
        // Return a success response
        return response()->json(['message' => 'Contact inquiry submitted successfully!', 'data' => $contactUs], 200);
    }
}
