<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'title' => 'required|max:255',
            'details' => 'required',
        ]);

        // Save the form input to the database
        Feedback::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'title' => $validated['title'],
            'details' => $validated['details'],
        ]);

        // Return a JSON response
        return response()->json(['message' => 'Your feedback has been submitted!']);
    }
}