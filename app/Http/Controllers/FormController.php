<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;
class FormController extends Controller
{
    public function store(Request $request)
    {
     
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'title' => 'required|max:255',
            'details' => 'required',
        ]);

        Feedback::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'title' => $validated['title'],
            'details' => $validated['details'],
        ]);

        return response()->json(['message' => 'Your feedback has been submitted!']);
    }
}