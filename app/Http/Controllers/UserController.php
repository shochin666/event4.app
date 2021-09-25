<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('editProfile',['user'=>$user]);
    }

    // public function _edit(Request $request)
    // {
    //     $name = $request->input('name');
    //     $email = $request->input('email');
    //     $password = $request->input('password');
    // }

    public function update(Request $request)
    {
        Auth::user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
            ,
            // 'password' => $request->input('password')
        ]);

        // 変更画面でパスワードを表示したい
        // dd(Auth::user());

        return redirect('home');
    }
}
