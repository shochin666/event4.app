@extends('layouts.app')

@section('content')

<main class="px-auto w-full m-0 p-0 w-140 mb-40">
    <p class="ml-20 lg:ml-32 xl:ml-32 text-5xl lg:text-2xl xl:text-2xl text-gray-500 pt-10 sm:font-thin md:font-thin lg:font-normal xl:font-normal">タイムライン</p>
    <div class="mt-10 lg:mt-0 xl:mt-0 grid grid-cols-1 gap-10 lg:px-0 xl:px-0 mb-8">
       <a href="set_event" class="btn btn-success mx-auto flex justify-around w-36 py-2  text-gray-600 hover:text-purple-600 md:mr-36 lg:mr-40 xl:mr-60 sm:hidden md:hidden lg:block xl:block text-center">
           <span>イベント作成</span>
        </a>

        <div class="ml-auto w-36 h-36 mr-24 mb-32 pt-500 border rounded-full lg:hidden xl:hidden fixed bottom-36 right-0 z-10 bg-indigo-300 shadow-md">
            <a href="set_event" class="w-sm btn btn-success lg:hidden xl:hidden">
                <span class="material-icons ml-11 mt-11 text-white text-6xl">create</span>
            </a>
        </div>

        <?php $event_num = count($events);
        ?>

        @if($event_num == 0)
        <div class="flex justify-center mt-16">
            <div class="flex flex-col">
                <p class="text-gray-500 text-2xl flex justify-center">まだ投稿がありません</p>
                <p class="justify-center mt-4 text-gray-500 sm:hidden md:hidden lg:block xl:block">右上の作成ボタンから新しくイベントを作成しよう</p>
                <p class="justify-center mt-4 text-gray-500 sm:block md:block lg:hidden xl:hidden">右下の作成ボタンから新しくイベントを作成しよう</p>
            </div>
        </div>
        @else
        @endif

        <div>

        </div>

        @foreach($events as $event)
        <div class="sm:block md:block lg:hidden xl:hidden">
            <a href="detail/{{ $event->id }}" class="sm:block md:block lg:hidden xl:hidden z-0 h-full w-full">
                <div class="mx-auto min-w-min lg:h-64 xl:h-64 lg:border xl:border lg:border-blue-200 xl:border-brue-200 lg:rounded-lg xl:rounded-lg bg-white sm:block md:block lg:hidden xl:hidden">
                    

                    <div class="flex flex-row w-screen py-20">
                        
                        <div class="flex flex-col mx-auto"> 
                            <div class="flex flex-col mt-3 lg:mt-4 xl:mt-4 whitespace-nowrap">
                                <div class="flex mx-auto">
                                    <div class="w-10 h-10 border-l-4 border-indigo-300">　</div>
                                    <div class=" text-gray-500 text-5xl  mb-2 sm:font-thin md:font-thin lg:font-normal xl:font-normal">開催日 {{ $event->date }}</div>
                                </div>
                                
                                <div class="mt-1 ml-8 text-gray-500 text-md flex flex-col sm:hidden md:hidden lg:block  xl:block">
                                    <span>{{ $event->place }}</span>
                                </div> 
                            </div>

                            <div class="flex justify-center lg:ml-20 xl:ml-20">
                                <div class="ml-16 lg:ml-32 xl:32 lg:pl-8 xl:pl-8 mt-2 mr-10 flex flex-col text-center text-none">
                                    <div class="sm:hidden md:hidden lg:block  xl:block">
                                        <span class="text-gray-500 mb-2">募集人数  <span class="text-pink-500">{{ $event->people }}</span>人</span>
                                    </div>
                                    <span class="text-7xl font-hairline  whitespace-nowrap text-gray-700">{{Str::limit($event->name, 14)}}</span>
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

                        </div>
                    </div>
                </div>
            </a>
        </div>



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
