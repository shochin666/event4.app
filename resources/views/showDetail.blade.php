@extends('layouts.app')

@section('content')

<?php
$event = $events->where('id', $event_id)->first()
?>

<main class="container mx-auto px-20 lg:px-40 xl:px-60">
    <div class="flex flex-col">
        <div class="flex flex-col mt-4">
            <span class="text-2xl text-gray-500 mb-4">{{ $event->date }} 開催</span>
            <div class="flex flex-row w-full justify-between">
                <span class="text-5xl font-thin text-gray-700 mt-2 pt-4 whitespace-nowrap 2xl:ml-32">{{ $event->name }}</span>

                @if(Auth::user()->isMylist($event)) 
                @else
                <form class="sm:hidden md:hidden lg:hidden xl:block 2xl:block ml-40 xl:mr-12 2xl:mr-32" method="POST" action="{{ route('add', $event->id) }}">
                    @csrf
                    <button type="submit" class="mt-8 mx-auto flex justify-around w-36 py-2 text-gray-600 btn btn-success lg:mr-10 xl:mr-4 hover:bg-gray-100">マイリストに追加</button>
                </form>
                @endif
            </div>
        </div>
        <div class="rounded-xl bg-indigo-50 max-w-3xl min-w-2xl h-24 container mx-auto mt-5 flex flex-col justify-around text-lg">
            <p class="text-gray-600 px-10 break-all">このイベントは <span class="text-pink-500">{{ $event->date }}</span> に <span class="text-pink-500">{{ $event->place}}</span> にて開催予定です。</p>
        </div>
        <div class="detail mt-12">
            <p class="text-2xl text-gray-500 2xl:ml-32">ホストから</p><!-- ホスト名を入れたい -->
            <div class="rounded-xl bg-pink-50 max-w-3xl min-w-2xl h-24 container mx-auto mt-3 flex flex-col justify-around px-10">
                <p class="text-gray-600 text-lg break-all">{{ $event->detail }}</p>
            </div>
        </div>
        @auth
        <div class="flex flex-col mt-10">
             @if(Auth::user()->isMylist($event))
             <form method="POST" action="{{ route('delete', $event->id) }}" class="text-center">              
            @csrf           
                <button href="#" class="h-11 lg:hidden xl:hidden 2xl:hidden w-36 lg:mt-2 xl:mt-2 lg:mb-4 xl:mb-4 p-2"><span class="text-gray-600 flex justify-center whitespace-nowrap">マイリストから削除</span></button>
            </form>
            @else
            <form class=" xl:hidden" method="POST" action="{{ route('add', $event->id) }}">
                        @csrf
                        <button type="submit" class="mx-auto flex justify-around w-36 py-2 text-gray-600 btn btn-success">マイリストに追加</button>
            </form>
            @endif
            

            @if(Auth::user()->isJoin($event))
            <form method="POST" action="{{ route('delete2', $event->id) }}">
                @csrf
                <button type="submit" class="mt-8 mx-auto rounded-3xl md:rounded-none xl:rounded-none sm:shadow-md md:shadow-none lg:shadow-none xl:shadow-none bg-indigo-400 md:bg-white lg:bg-white xl:bg-white 2xl:bg-white border md:border-none lg:border-none xl:border-none border-gray-400 flex justify-around w-36 py-2 text-white md:text-gray-600 xl:text-gray-600 2xl:text-gray-600 hover:bg-indigo-100 btn">キャンセル</button>
            </form>
            
            @else
                
            <form action="{{ route('joinEvent', $event->id) }}" method='POST'>
                @csrf
                <button type="submit" class="mt-8 mx-auto rounded-3xl  lg:rounded-none xl:rounded-none sm:shadow-md 
                md:shadow-md lg:shadow-none xl:shadow-none bg-indigo-400 lg:bg-white xl:bg-white 2xl:bg-white border md:border-none xl:border-none border-gray-400 flex justify-around w-36 py-2 text-white
                lg:text-gray-600 xl:text-gray-600 2xl:text-gray-600  md:hover:bg-indigo-100 lg:hover:bg-indigo-100 xl:hover:bg-indigo-100 btn">参加する</button>
            </form>
            @endif
            
        </div>
        @endauth
            
    </div>


</main>
@endsection
