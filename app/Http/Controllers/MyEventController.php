<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class MyEventController extends Controller
{
    public function index(){
        $events=Event::where('user_id',Auth::id())->get();

        return view('myevent',compact('events'));
    }
}
