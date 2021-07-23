<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        return view('users.show')
            ->with('user', Auth::user());
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');

        

        $user->save();

        return redirect()->back()
            ->with('status', 'プロフィールを変更しました。');
    }
}
