<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\User;

class MylistController extends Controller
{
    public function index()
    {
        // ここの()をいれない理由がわからない
        $events = Auth::user()->mylistEvents()->orderBy('created_at')->paginate(5);

        return view('mylist', ['events' => $events]);
    }
}
