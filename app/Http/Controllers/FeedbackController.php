<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;
class FeedbackController extends Controller
{
    public function index()
    {
        $feedbackData = Feedback::all();
        return response()->json($feedbackData);
    }
    public function vote(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        if ($request->input('vote') === 'upvote') {
            $feedback->increment('votes');
        } else {
            $feedback->decrement('votes');
        }
        return response()->json(['votes' => $feedback->votes]);
    }
}