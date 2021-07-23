<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;

class ReviewController extends Controller
{
    public function show($id)
    {
        $review = Review::where('id', $id)->where('status', 1)->first();
        return view('show', compact('review'));
    }

    public function index()
    {
        $reviews = Review::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $Review = new Review();
        $Review->fill($request->all())->save();

        return redirect('/index')
            ->with('flash_message', '投稿が完了しました！');
    }
}
