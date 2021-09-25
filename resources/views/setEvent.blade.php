@extends('layouts.app')

@section('content')
<div>
     <div class="bg-white py-20 mx-20">
          <span class="text-2xl text-gray-500 ml-20">イベント作成</span>

          <div class="h-16">
               <!-- space -->
          </div>

          <div class="">


               <!-- エラーメッセージは後で日本語化 -->
               
                    @if ($errors->any())
                    <div class="mx-40 rounded-md bg-red-100 mb-10 p-10">
                    <h2 class="text-lg">以下を修正してください。</h2>
                    <ul class="mx-4">
                         @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    @endif
                    </div>
         

               <form action="{{ route('setEvent.post') }}" method="POST">
               @csrf
               <div class="flex justify-center mx-64 lg:mx-64 xl:mx-96 lg:flex-row xl:flex-row flex-col">
                    <div class="flex flex-col lg:mr-10 xl:mr-10">
                              <label class="event_name mb-5 flex lg:justify-between xl:justify-between justify-center">
                                   <span class="mr-2 text-gray-600 my-auto text-lg whitespace-nowrap">イベント名</span>
                                   <input class="border rounded-md h-10 pl-2 shadow-md w-72 lg:w-60 xl:w-60 text-lg" name="name" type="text" value="{{ old('name') }}">
                              </label>
                              <label class="flex flex-row mb-5 lg:justify-between xl:justify-between justify-center">
                                   <span class="block container my-auto mr-2 w-auto text-gray-600 text-lg whitespace-nowrap">開催日</span>
                                   <input class="ml-2 border rounded-md h-10 shadow-md w-72 lg:w-44 xl:w-44 px-2 text-lg text-gray-600" type="date" name="date" value="{{ old('date') }}">
                              </label>
                              <label class="event_name flex lg:justify-between xl:justify-between justify-center">
                              <span class="text-gray-600 mr-2 my-auto text-lg whitespace-nowrap">開催場所</span>
                              <input class="border shadow-md rounded-md h-10 pl-2 w-72 lg:w-52 xl:w-52 text-lg" name="place" type="text" value="{{ old('place') }}">
                         </label>
                              <label class="people flex lg:justify-between xl:justify-between justify-center">
                                   <span class="mr-2 text-gray-600 my-auto text-lg whitespace-nowrap">募集人数</span>
                                   <div class="flex flex-col pt-5">
                                        <input min=0 class="border shadow-md rounded-md h-10 pl-2 focus:placeholder-white w-56 lg:w-44 xl:w-44 text-lg" placeholder="例) 13" name="people" type="number" value="{{ old('people') }}">
                                        <span class="text-sm text-gray-600 whitespace-nowrap mt-1 ml-1">半角英数字で入力</span>
                                   </div>
                              </label>
                    </div>
                    <div class="mt-8 lg:mt-0 xl:mt-0 sm:w-76 md:w-76 lg:ml-10 xl:ml-10 flex justify-center">
                         <!-- コメント欄を高さfullにしたい -->
                         <label class="event_name flex flex-col">
                              <span class="text-gray-600 whitespace-nowrap">コメント(詳細など)</span>
                              <textarea name="detail" rows="8" cols="60" class="w-full border shadow-md rounded-md sm:w-80 md:w-80 lg:w-96 xl:w-96 h-44 mt-2 p-2 text-lg" placeholder="例) 服装は自由です。当日は交通機関をご利用ください。">{{ old('detail') }}</textarea>
                         </label>
                    </div>
               </div>


               {{ csrf_field() }}

               <button class="btn mt-12 lg:mt-24 xl:mt-24 mx-auto rounded-3xl lg:rounded-md xl:rounded-md border border-gray-400 flex justify-around w-36 py-2 bg-blue-500 xl:bg-white lg:bg-white text-white lg:text-gray-600 xl:text-gray-600 lg:hover:bg-blue-500 xl:hover:bg-blue-500 lg:hover:text-white xl:hover:text-white">完了</button>
               </form>
          </div>
     </div>
</div>


@endsection