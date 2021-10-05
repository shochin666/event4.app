@extends('layouts.app')

@section('content')

<?php
$event = $events->where('id', $event_id)->first()
?>

<main class="container mx-auto px-20 lg:px-40 xl:px-60 mb-20">
    <div class="flex flex-col">
        <div class="flex flex-col mt-20 mb-8">
            <span class="text-4xl lg:text-3xl xl:text-3xl text-gray-500 mt-4 mb-1">{{ $event->date }} 開催</span>
            <div class="flex flex-row justify-between">
                <span class="text-8xl lg:text-6xl xl:text-6xl font-thin text-gray-700 mt-2 pt-4 2xl:ml-32 break-words whitespace-pre-wrap">{{ $event->name }}</span>

                @if(Auth::user()->isMylist($event)) 
                @else
                <form class="sm:hidden md:hidden lg:hidden xl:block 2xl:block ml-40 xl:mr-12 2xl:mr-32" method="POST" action="{{ route('add', $event->id) }}">
                    @csrf
                    <button type="submit" class="whitespace-nowrap text-xl mt-8 mx-auto flex justify-around w-36 py-2 hover:text-gray-400 text-gray-600 btn btn-success lg:mr-10 xl:mr-4">マイリストに追加</button>
                </form>
                @endif
            </div>
        </div>
        <div class="rounded-xl bg-indigo-50 max-w-3xl min-w-2xl h-24 container mx-auto mt-5 flex flex-col justify-around text-3xl lg:text-lg xl:text-lg px-2 py-16">
            <p class="text-gray-600 px-10 break-all">このイベントは <span class="text-pink-500">{{ $event->date }}</span> に <span class="text-pink-500">{{ $event->place}}</span> にて開催予定です。</p>
        </div>
        <div class="detail mt-32 lg:mt-20 xl:mt-20">
            <p class="text-4xl lg:text-2xl xl:text-2xl text-gray-500 2xl:ml-32">ホストから</p>
            <div class="rounded-xl bg-pink-50 max-w-3xl min-w-2xl h-24 container mx-auto mt-3 flex flex-col justify-around px-10">
                <p class="text-gray-600 text-3xl lg:text-lg xl:text-lg px-2 py-16 break-all">{{ $event->detail }}</p>
            </div>
        </div>
        @auth
        <div class="flex flex-col mt-96 lg:mt-20 xl:mt-20">
             
                
        <form method="POST" action="{{ route('createdDelete2', $event->id) }}">
                @csrf
                <button type="submit" class="mt-20 lg:mt-8 xl:mt-8 mx-auto rounded-lg  lg:rounded-none xl:rounded-none sm:shadow-lg 
                md:shadow-lg lg:shadow-none xl:shadow-none bg-red-500 lg:bg-white xl:bg-white 2xl:bg-white border md:border-none xl:border-none border-gray-400 w-full flex justify-around text-white
                lg:text-gray-600 xl:text-gray-600 2xl:text-gray-600 hover:text-gray-400 btn  whitespace-nowrap py-10 lg:py-0 xl:py-0 text-5xl lg:text-2xl xl:text-2xl font-light">削除する</button>
            </form>
        </div>
        @endauth
            
    </div>


</main>
@endsection
