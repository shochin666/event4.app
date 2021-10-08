<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\JoinEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator; 



class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(5);
        return view('home', ['events' => $events]);
    }

    public function showDetail($id)
    {
        $events = Event::all();
        $event_id = $id;
        return view('showDetail', compact('events', 'event_id'));
    }

    public function showDetailDelete($id)
    {
        $users = User::all();
        $events = Event::all();
        $event_id = $id;

        $_myevents = JoinEvent::where('event_id', $event_id)->get();

        return view('detailDelete', compact('events', 'event_id', '_myevents', 'users'));
    }

    
    protected $formItems = ['date', 'people', 'name', 'place', 'detail'];

    protected $validator = [
        'date' => 'required',
        'people' => 'required|min:1',
        'name' => 'required|max:14',
        'place' => 'required',
        'detail' => 'required|max:255',
    ];

    public function show()
    {
        return view('setEvent');
    }

    public function post(Request $request)
    {
        $input = $request->only($this->formItems);

        $validator = Validator::make($input, $this->validator);
        if($validator->fails()) {
            return redirect()->action('EventController@show')
            ->withInput()
            ->withErrors($validator);
        }

        // セッションに書き込む
        $request->session()->put('form_input', $input);

        return redirect()->action('EventController@confirm');

    }

    public function confirm(Request $request)
    {
        // セッションから値を取り出す
        $input = $request->session()->get('form_input');

        // セッションに値がない時はフォームに戻る
        if(!$input)
        {
            return redirect()->action('EventController@show');
        }

        return view('eventConfirm', ['input' => $input]);
    }

    public function send(Request $request)
    {
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");

        if($request->has("back"))
        {
            return redirect()->action('EventController@show')
            ->withInput($input);
        }

        if($request->has("complete"))
        {
            $event = new Event();
            $event->date = $input['date'];
            $event->people = $input['people'];
            $event->name = $input['name'];
            $event->place = $input['place'];
            $event->detail = $input['detail'];
            $event->user_id = Auth::id();
            $event->save();

            return redirect()->action('EventController@complete');
        }

		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action('SampleFormController@show');
		}

        // ここでメールを送信するなどの処理をする

        //セッションを空にする
		$request->session()->forget("form_input");

		return redirect()->action('EventController@complete');
    }

    public function complete()
    {
        return view('/eventComplete');
    }




    public function join(Request $request)
    {
        return redirect('/home');
    }

    public function add(Event $event)
    {
        Auth::user()->mylistEvents()->attach($event->id);

        return redirect()->back();
    }

    public function delete(Event $event)
    {
        Auth::user()->mylistEvents()->detach($event->id);

        return redirect()->back();
    }

    public function eventdelete(Event $event)
    {
        Auth::user()->myjoinEvents()->detach($event->id);

        return redirect()->back();
    }

    public function joinEvent(Event $event)
    {
 
        Auth::user()->myjoinEvents()->attach($event->id);

        return redirect()->back();
    }

    public function delete2(Event $event)
    {
        Auth::user()->myjoinEvents()->detach($event->id);

        return redirect()->back();
    }

    public function createdDelete(Event $event)
    {

        $event->delete();

        return redirect()->back();
    }

    public function createdDelete2(Event $event)
    {

        $event->delete();

        return view('eventComplete2');
    }
}
