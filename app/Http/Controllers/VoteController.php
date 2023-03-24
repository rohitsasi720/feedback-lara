<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $user_id = $request->input('user_id');
        $feedback_id = $request->input('feedback_id');
        $vote_type = $request->input('vote_type');

        $existing_vote = Vote::where('user_id', $user_id)->where('feedback_id', $feedback_id)->first();

        if ($existing_vote) {
            $existing_vote->vote_type = $vote_type;
            $existing_vote->save();
        } 
        else {
            $vote = new Vote;
            $vote->user_id = $user_id;
            $vote->feedback_id = $feedback_id;
            $vote->vote_type = $vote_type;
            $vote->save();
        }
        $upvotes = Vote::where('feedback_id', $feedback_id)->where('vote_type', 1)->count();
        $downvotes = Vote::where('feedback_id', $feedback_id)->where('vote_type', -1)->count();
        $total_votes = $upvotes - $downvotes;

        return response()->json(['success' => true, 'total_votes' => $total_votes]);
    }

    public function totalVotes($id)
    {
        $upvotes = Vote::where('feedback_id', $id)->where('vote_type', 1)->count();
        $downvotes = Vote::where('feedback_id', $id)->where('vote_type', -1)->count();
        $total_votes = $upvotes - $downvotes;

        return response()->json(['success' => true, 'total_votes' => $total_votes]);
    }
    
}