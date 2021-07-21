<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;

class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews');
    }

    public function store(Request $request)
    {
        $post = $request->all();
        $data = [
            'user_id' => Auth::id(),
            'title' => $post['title'],
            'body' => $post['body']
        ];

        Review::insert($data);

        return redirect('/');
            // ->route('review.create');
    }
}
