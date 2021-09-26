@extends('layouts.app')

@section('content')

<main class="px-auto w-full m-0 p-0 w-140">
    <div class="mb-20 mt-0 grid grid-cols-1 gap-10  w-full px-10 sm:px-10 md:px-10 lg:px-0 xl:px-0">

    <p class="ml-32 text-2xl text-gray-500 pt-10">マイリスト</p>

        @foreach($events as $event)

        <a href="detail/{{ $event->id }}" class="w-full sm:block md:block lg:hidden xl:hidden z-0">
            <div class="mx-auto min-w-min max-w-screen-md sm:w-4/6 lg:h-64 xl:h-64 border-4 lg:border xl:border border-blue-200 rounded-lg bg-white w-full sm:block md:block lg:hidden xl:hidden">

                <div class="flex flex-row w-full">
                    
                    <div class="py-4 flex sm:flex-row md:flex-row lg:flex-col xl:flex-col"> 
                        <div class="flex flex-col mt-3 lg:mt-4 xl:mt-4 whitespace-nowrap">
                            <div class="pl-6 text-gray-500 text-lg">開催日 {{ $event->date }}</div>
                            <div class="mt-1 ml-8 text-gray-500 text-md flex flex-col sm:hidden md:hidden lg:block  xl:block">
                                <span>{{ $event->place }}</span>
                            </div> 
                        </div>

                        <div class="flex lg:justify-center xl:justify-center lg:ml-20 xl:ml-20">
                            <div class="ml-16 lg:ml-32 xl:32 lg:pl-8 xl:pl-8 mt-2 mr-6 flex flex-col text-center text-none">
                                <div class="sm:hidden md:hidden lg:block  xl:block">
                                    <span class="text-gray-500 mb-2">募集人数  <span class="text-pink-500">{{ $event->people }}</span>人</span>
                                </div>
                                <span class="text-4xl font-hairline pl-2 whitespace-nowrap">{{ $event->name }}</span>
                            </div>
                        </div>
                        
                        </div>
                    
                        <!-- 画面が大きな時の設定 -->
                    <div class="left-info ml-auto mr-10 lg:mt-4 xl:mt-4 flex flex-col sm:hidden md:hidden lg:block xl:block">
                        @auth
                            <form method="POST" action="{{ route('add', $event->id) }}">
                            @csrf
                                <button type="submit" class="btn btn-success bg-indigo-100 w-36 lg:mt-2 xl:mt-2 p-2 rounded-xl shadow-md hover:bg-indigo-200 text-gray-600 text-sm  xs:hidden sm:hidden md:hidden lg:block  xl:block">マイリストに追加</button>
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
                                <span>{{ $event->place }}</span>
                            </div> 
                        </div>

                        <div class="flex lg:justify-center xl:justify-center lg:ml-20 xl:ml-20">
                            <div class="ml-16 lg:ml-32 xl:32 lg:pl-8 xl:pl-8 mt-2 mr-10 flex flex-col text-center text-none">
                                <div class="sm:hidden md:hidden lg:block  xl:block text-left">
                                    <span class="text-gray-500 mb-2">募集人数  <span class="text-pink-500">{{ $event->people }}</span>人</span>
                                </div>
                                <span class="text-4xl font-hairline pl-10 whitespace-nowrap">{{ $event->name }}</span>
                            </div>
                        </div>
                        
                        </div>
                    
                    <div class="left-info ml-auto mr-10 lg:mt-4 xl:mt-4 flex flex-col">
                        @auth
                            <form method="POST" action="{{ route('delete', $event->id) }}">              
                                @csrf           
                              <button href="#" class="bg-white w-36 lg:mt-2 xl:mt-2 lg:mb-0 xl:mb-0 p-2 hover:bg-red-200 text-gray-600 text-sm"><span class="text-gray-600 text-sm flex justify-center">削除</span></button>
                            </form>
                        @endauth

                        <!-- ボタン出し入れできるようにする -->
                        <a href="detail/{{ $event->id }}" class="bg-white w-36 mt-1 lg:mt-0 xl:mt-0 p-2 hover:bg-gray-200 sm:hidden md:hidden lg:block xl:block"><span class="text-gray-600 text-sm flex justify-center">詳しく見る</span></a> 
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

                  