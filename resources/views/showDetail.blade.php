@extends('layouts.app')

@section('content')

<?php
$event = $events->where('id', $event_id)->first()
?>

<main class="container mx-auto px-64">
    <div class="flex flex-col">
        <div class="flex flex-col mt-4">
            <span class="text-2xl text-gray-500">{{ $event->date }} 開催</span>
            <span class="text-5xl font-thin text-gray-700 mt-2">{{ $event->name }}</span>
        </div>
        <div class="rounded-xl bg-indigo-50 max-w-3xl min-w-2xl h-24 container mx-auto mt-5 flex flex-col justify-around text-lg">
            <p class="text-gray-600 px-10">このイベントは <span class="text-pink-500">{{ $event->date }}</span> に <span class="text-pink-500">{{ $event->place}}</span> にて開催予定です。</p>
        </div>
        <div class="detail mt-12">
            <p class="text-2xl text-gray-500">ホストから</p><!-- ホスト名を入れたい -->
            <div class="rounded-xl bg-pink-50 max-w-3xl min-w-2xl h-24 container mx-auto mt-3 flex flex-col justify-around">
                <p class="px-10 text-gray-600 text-lg">{{ $event->detail }}</p>
            </div>
        </div>
        @auth
            <form method="POST" action="{{ route('add', $event->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-success bg-indigo-100 w-36 lg:mt-2 xl:mt-2 p-2 rounded-xl shadow-md hover:bg-indigo-200 text-gray-600 text-sm lg:hidden xl:hidden">マイリストに追加</button>
            </form>
            @endauth
        <form action='/detail/{id}' method='POST'>
            {{ csrf_field() }}
            <!-- <input type="hidden" name="name">{{}}</input> -->
            <button href="#" class="mt-8 mx-auto rounded-3xl border border-gray-400 flex justify-around w-36 py-2 text-gray-600 btn">参加する</button>
        </form>
    </div>


</main>
@endsection
