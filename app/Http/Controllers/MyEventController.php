<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinEvent;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class MyEventController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $myevents = Auth::user()->myjoinEvents()->where('Join_events.user_id', $id)->get();

        return view('myevent', ['myevents' => $myevents]);
    }

    public function created(){
        $events = Event::orderBy('created_at', 'desc')->paginate(5);
        return view('createdEvent', ['events' => $events]);
    }
}
