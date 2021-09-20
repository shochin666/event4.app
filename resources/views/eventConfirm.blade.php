@extends('layouts.app')

@section('content')
<div class="bg-blue-50 h-screen">
     <div class="h-20 bg-blue-50">
          <!-- space -->
     </div>
     <div class="border rounded-md bg-white py-20 mx-20">
          <span class="text-2xl text-gray-500 ml-20">イベント内容確認</span>
          <form method="post" action="{{ route('setEvent.send') }}">
               
          @csrf

               <div class="h-16">
                    <!-- space -->
               </div>
               <form method="post" action="{{ route('setEvent.send') }}">
               <div class="flex flex-col text-gray-600 text-lg">
                    <span class="flex justify-center mb-4">イベント名：{{ $input['name'] }}</span>
                    <span class="flex justify-center mb-4">開催日：{{ $input['date'] }}</span>
                    <span class="flex justify-center mb-4">開催場所：{{ $input['place'] }}</span>
                    <span class="flex justify-center mb-4">募集人数：{{ $input['people'] }} 人</span>
                    <span class="flex justify-center mb-4">コメント：{{ $input['detail'] }}</span>
               </div>
               <div class="flex flex-col lg:flex-row xl:flex-row mx-40">
                    <!-- このボタンをおしたらリダイレクトされるときにvalueを保持したい -->
                    <input name="back" type="submit" value="戻る" style="cursor:pointer" class="btn mt-12 mx-auto rounded-3xl lg:rounded-md xl:rounded-md border lg:border-0 xl:border-0 bg-white border-gray-400 flex justify-around w-36 py-2 text-gray-600 hover:bg-gray-400 hover:text-white">
                    <input name="complete" type="submit" value="作成する" style="cursor:pointer" class="btn btn-success 
                    mt-12 mx-auto rounded-3xl border border-gray-400 flex justify-around w-36 py-2 sm:bg-indigo-400 md:bg-indigo-400 lg:bg-white xl:bg-white 
                    text-white lg:text-gray-600 xl:text-gray-600 hover:bg-blue-500 hover:text-white    lg:rounded-md xl:rounded-md">
               </div> 
          </form>
     </div>
</div>


@endsection