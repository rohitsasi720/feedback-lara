<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbackData = Feedback::all();
        return response()->json($feedbackData);
    }
}