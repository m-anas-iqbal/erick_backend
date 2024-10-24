<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qoutation;
use App\Models\Newsletter;
use App\Models\Contactus;
use App\Models\Partner;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function qoutation(Request $request)
    {
        $quote = Qoutation::create($request->all());
        return response()->json(['message' => 'Quote submitted successfully', 'data' => $quote], 200);
    }
    public function newsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $newsletter = Newsletter::create($request->only('email'));

        // Return a success response
        return response()->json(['message' => 'Subscribed successfully!', 'data' => $newsletter], 200);
    }
    public function contact(Request $request)
    {
        $contactUs = ContactUs::create($request->all());
        return response()->json(['message' => 'Contact inquiry submitted successfully!', 'data' => $contactUs], 200);
    }
    public function partner(Request $request)
    {
        $partner = Partner::create($request->all());
        return response()->json(['message' => 'Thank you for partnering with us!', 'data' => $partner], 200);
    }
}
