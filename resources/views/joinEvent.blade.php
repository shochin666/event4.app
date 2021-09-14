@extends('layouts.app')

@section('content')

<main class="container mx-auto px-64">
    <div class="mt-10 grid grid-cols-1 gap-10 container">
    <span class="text-2xl text-gray-500">参加リスト</span>
        @foreach($events as $event)
        
        <div class="mx-auto max-w-screen-md h-64 border border-blue-200 rounded-lg bg-white w-full">
            
            <div class="flex flex-row h-full">
                
                <div class="right-info flex flex-col"> 
                    <div class="up flex flex-col mt-4 mr-36">
                        <div class="pl-6 text-gray-500 text-lg">開催日 {!! str_replace('-', '/', $event->date) !!}</div>
                        <div class="mt-1 ml-8 text-gray-500 text-md flex flex-col">
                            <span>{{ $event->place }}</span>
                        </div> 
                    </div>

                    <div class="flex justify-center ml-20">
                        <div class="ml-32 pl-8 mt-2 flex flex-col">
                            <span class="text-gray-500 mb-2">募集人数 <span class="text-pink-500">{{ $event->people }}</span>人</span>
                            <span class="text-4xl font-hairline ml-0">{{ $event->name }}</span>
                        </div>
                    </div>
                    
                    </div>
                
                <div class="left-info ml-auto mr-10 mt-4 flex flex-col">
                    <a href="#" class="bg-red-100 w-36 mt-2 p-2 rounded-xl shadow-md hover:bg-red-200"><span class="text-gray-600 text-sm flex justify-center">削除</span></a>
                    <a href="detail/{{ $event->id }}" class="bg-gray-100 w-36 mt-2 p-2 rounded-xl shadow-md hover:bg-gray-200"><span class="text-gray-600 text-sm flex justify-center">詳しく見る</span></a> 
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection