@extends('layouts.app')

@section('content')

<main class="px-auto w-full m-0 p-0 w-140 mb-40">
    <p class="ml-32 text-2xl text-gray-500 pt-10">タイムライン</p>
    <div class="mt-0 grid grid-cols-1 gap-10  w-full px-10 sm:px-10 md:px-10 lg:px-0 xl:px-0 mb-8">
       <a href="set_event" class="border btn btn-success mx-auto rounded-md flex justify-around w-36 py-2 bg-white text-gray-600 hover:bg-gray-400 hover:text-white md:mr-36 lg:mr-40 xl:mr-60 sm:hidden md:hidden lg:block xl:block text-center">
           <span>イベント作成</span>
        </a>

        <div class="ml-auto w-16 h-16 mr-32 mb-16 pt-500 border-3xl border-4 rounded-full lg:hidden xl:hidden fixed bottom-0 right-0 z-10 bg-white shadow-md">
            <a href="set_event" class="w-sm btn btn-success lg:hidden xl:hidden">
                <span class="material-icons ml-4 mt-4 text-blue-400">create</span>
            </a>
        </div>

        @foreach($events as $event)

        <a href="detail/{{ $event->id }}" class="sm:block md:block lg:hidden xl:hidden z-0">
            <div class="mx-auto min-w-min sm:w-4/6 lg:h-64 xl:h-64 border-4 lg:border xl:border border-blue-200 rounded-lg bg-white w-full sm:block md:block lg:hidden xl:hidden max-w-screen-sm">

                <div class="flex flex-row w-full">
                    
                    <div class="py-4 flex sm:flex-row md:flex-row lg:flex-col xl:flex-col"> 
                        <div class="flex flex-col mt-3 lg:mt-4 xl:mt-4 whitespace-nowrap">
                            <div class="pl-6 text-gray-500 text-lg">開催日 {{ $event->date }}</div>
                            <div class="mt-1 ml-8 text-gray-500 text-md flex flex-col sm:hidden md:hidden lg:block  xl:block">
                                <span>{{ $event->place }}</span>
                            </div> 
                        </div>

                        <div class="flex lg:justify-center xl:justify-center lg:ml-20 xl:ml-20">
                            <div class="ml-16 lg:ml-32 xl:32 lg:pl-8 xl:pl-8 mt-2 mr-10 flex flex-col text-center text-none">
                                <div class="sm:hidden md:hidden lg:block  xl:block">
                                    <span class="text-gray-500 mb-2">募集人数  <span class="text-pink-500">{{ $event->people }}</span>人</span>
                                </div>
                                <span class="text-4xl font-hairline pl-6 whitespace-nowrap">{{Str::limit($event->name, 12)}}</span>
                            </div>
                        </div>
                        
                        </div>
                    
                    <div class="left-info ml-auto mr-10 lg:mt-4 xl:mt-4 flex flex-col sm:hidden md:hidden lg:block xl:block">
                        @auth
                            <form method="POST" action="{{ route('add', $event->id) }}">
                            @csrf
                                <button type="submit" class="btn btn-success bg-white w-36 lg:mt-2 xl:mt-2 p-2 rounded-xl shadow-md hover:bg-indigo-100 text-gray-600 text-sm  xs:hidden sm:hidden md:hidden lg:block  xl:block">マイリストに追加</button>
                            </form>
                        @endauth

                        <!-- ボタン出し入れできるようにする -->
                        <a href="detail/{{ $event->id }}" class="bg-red-100 w-36 mt-1 lg:mt-0 xl:mt-0 p-2 rounded-xl shadow-md hover:bg-red-200 sm:hidden md:hidden lg:block xl:block"><span class="text-gray-600 text-sm flex justify-center">詳しく見る</span></a> 
                    </div>
                </div>
            </div>
        </a>



        <div class="mx-auto min-w-min max-w-screen-md lg:h-64 xl:h-64 border border-blue-200 rounded-lg bg-white w-full sm:hidden md:hidden lg:block xl:block">

                <div class="flex flex-row w-full">
                    
                    <div class="py-4 flex sm:flex-row md:flex-row lg:flex-col xl:flex-col"> 
                        <div class="flex flex-col mt-3 lg:mt-4 xl:mt-4 whitespace-nowrap">
                            <div class="pl-6 text-gray-500 text-lg">開催日 {{ $event->date }}</div>
                            <div class="mt-1 ml-8 text-gray-500 text-md flex flex-col sm:hidden md:hidden lg:block  xl:block">
                                <span>{{Str::limit($event->place, 15)}}</span>
                            </div> 
                        </div>

                        <div class="flex lg:justify-center xl:justify-center lg:ml-20 xl:ml-20">
                            <div class="w-40 ml-16 lg:ml-32 xl:32 lg:pl-8 xl:pl-8 mt-2 mr-10 flex flex-col text-center text-none">
                                <div class=" sm:hidden md:hidden lg:block  xl:block text-left ml-0 whitespace-nowrap">
                                    <span class="text-gray-500 ">募集人数  <span class="text-pink-500">{{ $event->people }}</span>人</span>
                                </div>
                                <span class="text-4xl font-hairline lg:pl-8 xl:pl-12 pt-1 whitespace-nowrap">{{Str::limit($event->name, 15)}}</span>
                            </div>
                        </div>
                        
                        </div>
                    
                    <div class="left-info ml-auto mr-10 lg:mt-4 xl:mt-4 flex flex-col right-0 sm:hidden md:hidden lg:block xl:block">
                        @auth

                            @if(Auth::user()->isMylist($event)) 
                            @else
                            <form class="sm:hidden md:hidden lg:block xl:block 2xl:block ml-40 xl:mr-8 2xl:mr-8" method="POST" action="{{ route('add', $event->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success bg-white w-36 lg:mt-2 xl:mt-2 p-2   hover:bg-indigo-100 text-gray-600 text-sm  xs:hidden sm:hidden md:hidden lg:block  xl:block">マイリストに追加</button>
                            </form>
                            @endif
                        @endauth
                        

                        <!-- ボタン出し入れできるようにする -->
                        <a href="detail/{{ $event->id }}" class="sm:hidden md:hidden lg:block xl:block 2xl:block ml-40 xl:mr-8 2xl:mr-8 btn btn-success bg-white w-36 lg:mt-2 xl:mt-2 p-2 hover:bg-gray-200 text-gray-600 hover:text-white text-sm  xs:hidden"><span class="text-gray-600 text-sm flex justify-center">詳しく見る</span></a> 
                    </div>
                </div>
            </div>
        
       
        @endforeach
    </div>
    <div class="w-screen">
        {{ $events->links('vendor.pagination.default') }}
    </div>
</main>
@endsection
