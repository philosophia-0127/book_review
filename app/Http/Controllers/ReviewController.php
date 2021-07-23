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
        $post = $request->all();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        if ($request->image) {
            $request->file('image')->store('/public/images');
            $data = [
                'user_id' => Auth::id(),
                'title' => $post['title'],
                'body' => $post['body'],
                // $image = $request->image;
                // $file_name = \Str::random(10) . '.' . $image->getClientOriginalExtension();
                // $target_path = public_path('images/no_image.jpg');
                // $image->move($target_path, $file_name);
                ];
        } else {
            $data = [
                'user_id' => Auth::id(),
                'title' => $post['title'],
                'body' => $post['body']
            ];
        }

        Review::insert($data);

        return redirect('/index')
            ->with('flash_message', '投稿が完了しました！');
    }
}
