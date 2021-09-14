@extends('layouts.app')

@section('content')

<main class="px-auto w-full m-0 p-0">
    <div class="mt-0 grid grid-cols-1 gap-10  w-full px-10 lg:px-0">
       <a href="set_event" class="btn btn-success mt-12 mx-auto rounded-3xl border border-gray-400 flex justify-around w-36 py-2 bg-white text-gray-600 hover:bg-gray-400 hover:text-white md:mr-8 mr-40 shadow-md">イベント作成</a>

        @foreach($events as $event)
        
        <div class="mx-auto max-w-screen-md h-64 border border-blue-200 rounded-lg bg-white w-full">
            
            <div class="flex flex-row w-full">
                
                <div class="right-info flex flex-col"> 
                    <div class="up flex flex-col mt-4 ">
                        <div class="pl-6 text-gray-500 text-lg">開催日 {{ $event->date }}</div>
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
                    @auth
                        <form method="POST" action="{{ route('add', $event->id) }}">
                        @csrf
                            <button type="submit" class="btn btn-success bg-indigo-100 w-36 mt-2 p-2 rounded-xl shadow-md hover:bg-indigo-200 text-gray-600 text-sm">マイリストに追加</button>
                        </form>
                    @endauth

                    <!-- ボタン出し入れできるようにする -->
                    <a href="detail/{{ $event->id }}" class="bg-red-100 w-36 mt-2 p-2 rounded-xl shadow-md hover:bg-red-200"><span class="text-gray-600 text-sm flex justify-center">詳しく見る</span></a> 
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
