@extends('layouts.app')

@section('content')

<main class="px-auto w-full m-0 p-0 w-140 mb-40">
    <div class="mb-20 mt-0 grid grid-cols-1 gap-10 w-full px-auto">

    <p class="ml-20 lg:ml-32 xl:ml-32 text-5xl lg:text-2xl xl:text-2xl text-gray-500 pt-10 sm:font-thin md:font-thin lg:font-normal xl:font-normal">作成したイベント</p>
    <?php
    $flag = 0;
    if($events){
        foreach($events as $event){
            if($event->isOwner())
            $flag =+ 1;
        }
    }
    
    ?>

        @if($flag == 0)
            <!-- 投稿がない時に表示させる内容 -->
            <div class="flex justify-center mt-24">
                <div class="flex flex-col">
                    <p class="text-gray-500 text-2xl flex justify-center">作成されたイベントがありません</p>
                    <p class="flex justify-center mt-4 text-gray-500">タイムラインからイベントを作成しよう</p>
                </div>
            </div>
        @else
        @endif

        @if($events)
        @foreach($events as $event)
         @if($event->isOwner())
         <div class="sm:block md:block lg:hidden xl:hidden">
            <a href="detail/delete/{{ $event->id }}" class="sm:block md:block lg:hidden xl:hidden z-0 h-full w-full">
                <div class="mx-auto min-w-min lg:h-64 xl:h-64 lg:border xl:border lg:border-blue-200 xl:border-brue-200 lg:rounded-lg xl:rounded-lg bg-white sm:block md:block lg:hidden xl:hidden  justify-center">
                    

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
                            <div class="ml-16 lg:ml-32 xl:32 lg:pl-8 xl:pl-8 mt-2 mr-10 flex flex-col text-center text-none">
                                <div class="sm:hidden md:hidden lg:block  xl:block text-left">
                                    <span class="text-gray-500 mb-2">募集人数  <span class="text-pink-500">{{ $event->people }}</span>人</span>
                                </div>
                                <span class="text-4xl font-hairline pl-10 whitespace-nowrap">{{Str::limit($event->name, 12)}}</span>
                            </div>
                        </div>
                        
                        </div>
                    
                    <div class="left-info ml-auto mr-10 lg:mt-4 xl:mt-4 flex flex-col">
                        @auth
                            <form method="POST" action="{{ route('createdDelete', $event->id) }}">              
                                @csrf           
                              <button href="#" class="bg-white w-36 lg:mt-2 xl:mt-2 lg:mb-0 xl:mb-0 p-2 hover:bg-red-200 text-gray-600 text-sm"><span class="text-gray-600 text-sm flex justify-center">削除</span></button>
                            </form>
                        @endauth


                        <!-- ボタン出し入れできるようにする -->
                        <a href="detail/delete/{{ $event->id }}" class="bg-white w-36 mt-1 lg:mt-0 xl:mt-0 p-2 hover:bg-gray-200 sm:hidden md:hidden lg:block xl:block"><span class="text-gray-600 text-sm flex justify-center">詳しく見る</span></a> 
                    </div>
                </div>
            </div>
        
            @endif
        @endforeach
        @endif
    </div>
</main>
@endsection

                  