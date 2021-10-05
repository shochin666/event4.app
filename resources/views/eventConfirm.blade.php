@extends('layouts.app')

@section('content')
<div class="bg-blue-50 h-screen">
     <div class="h-20 bg-blue-50">
          <!-- space -->
     </div>
     <div class="border rounded-md bg-white py-20 mx-20">
     <p class="ml-20 lg:ml-32 xl:ml-32 text-5xl lg:text-2xl xl:text-2xl text-gray-500 pt-0 sm:font-thin md:font-thin lg:font-normal xl:font-normal mb-10">イベント内容確認
     </p>
     <form method="post" action="{{ route('setEvent.send') }}">
               
          @csrf

               <div class="h-48 lg:h-16 xl:h-16">
                    <!-- space -->
               </div>
               <form method="post" action="{{ route('setEvent.send') }}">
               <div class="flex flex-col text-gray-600 text-4xl lg:text-lg xl:text-lg sm:font-thin md:font-thin lg:font-normal mb-56 lg:mb-0 xl:mb-0">
                    <span class="flex justify-center mb-8 lg:mb-4 xl:mb-4">イベント名：{{ $input['name'] }}</span>
                    <span class="flex justify-center mb-8 lg:mb-4 xl:mb-4">開催日：{{ $input['date'] }}</span>
                    <span class="flex justify-center mb-8 lg:mb-4 xl:mb-4">開催場所：{{ $input['place'] }}</span>
                    <span class="flex justify-center mb-8 lg:mb-4 xl:mb-4">募集人数：{{ $input['people'] }} 人</span>
                    <span class="flex justify-center mb-8 lg:mb-4 xl:mb-4">コメント：{{ $input['detail'] }}</span>
               </div>
               <div class="flex flex-col lg:flex-row xl:flex-row mx-40">
                    <!-- このボタンをおしたらリダイレクトされるときにvalueを保持したい -->
                    <button name="back" type="submit" class="mt-20 mx-auto  bg-white w-full flex justify-around text-gray-500  md:hover:bg-indigo-100 lg:hover:bg-indigo-100 xl:hover:bg-indigo-100 btn  whitespace-nowrap py-0 text-5xl lg:text-2xl xl:text-2xl font-light">戻る</button>
                    <button type="submit" class="mt-20 mx-auto rounded-lg  lg:rounded-none xl:rounded-none sm:shadow-lg 
                md:shadow-lg lg:shadow-none xl:shadow-none bg-blue-500 lg:bg-white xl:bg-white 2xl:bg-white w-full border md:border-none xl:border-none border-gray-400 flex justify-around text-white
                lg:text-gray-600 xl:text-gray-600 2xl:text-gray-600 hover:text-gray-400 btn  whitespace-nowrap py-10 lg:py-0 xl:py-0 text-5xl lg:text-2xl xl:text-2xl font-light">作成する</button>
               </div> 
          </form>
     </div>
</div>


@endsection