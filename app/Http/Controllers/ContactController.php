<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;
class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        ContactSubmission::create($validatedData);

        return response()->json(['message' => 'Form submission successful'], 200);
    }
    public function index()
    {
        $contacts = ContactSubmission::all();
        return response()->json($contacts);
    }
}
