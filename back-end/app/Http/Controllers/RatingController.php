<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $rating = Rating::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'rating' => $request->rating
        ]);

        return response()->json(['data' => $rating]);
    }

    public function show($post_id)
    {
        $average_rating = Rating::where('post_id', $post_id)->avg('rating');

        return response()->json(['data' => $average_rating]);
    }
}

