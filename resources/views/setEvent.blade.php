@extends('layouts.app')

@section('content')
<div class="bg-blue-50 h-screen">
     <div class="h-20 bg-blue-50">
          <!-- space -->
     </div>
     <div class="border rounded-md bg-white py-20 mx-20">
          <span class="text-2xl text-gray-500 ml-20">イベント作成</span>

          <div class="h-16">
               <!-- space -->
          </div>

          <div class="justify-center flex flex-col">


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
               <div class="flex flex-row justify-center">
                    <div class="flex flex-col mr-10">
                              <label class="event_name mb-5 flex justify-between">
                                   <span class="mr-2 text-gray-600 my-auto text-lg">イベント名</span>
                                   <input class="border rounded-md h-10 pl-2 shadow-md w-52 text-lg" name="name" type="text" value="{{ old('name') }}">
                              </label>
                              <label class="flex flex-row mb-5 justify-between">
                                   <span class="block container my-auto mr-2 w-auto text-gray-600 text-lg">開催日</span>
                                   <input class="ml-2 border rounded-md h-10 shadow-md w-44 px-2 text-lg text-gray-600" type="date" name="date" value="{{ old('date') }}">
                              </label>
                              <label class="event_name flex justify-between">
                              <span class="text-gray-600 mr-2 my-auto text-lg">開催場所</span>
                              <input class="border shadow-md rounded-md h-10 pl-2 w-52 text-lg" placeholder="例)池袋パルコF2" name="place" type="text" value="{{ old('place') }}">
                         </label>
                              <label class="people flex justify-between">
                                   <span class="mr-2 text-gray-600 my-auto text-lg">募集人数</span>
                                   <div class="flex flex-col pt-5">
                                        <input min=0 class="border shadow-md rounded-md h-10 pl-2 focus:placeholder-white w-44 text-lg" placeholder="例) 13" name="people" type="number" value="{{ old('people') }}">
                                        <span class="text-sm text-gray-600">半角英数字で入力</span>
                                   </div>
                              </label>
                    </div>
                    <div class="ml-10 h-full">
                         <!-- コメント欄を高さfullにしたい -->
                         <label class="event_name flex flex-col">
                              <span class="text-gray-600">コメント(詳細など)</span>
                              <textarea name="detail" rows="8" cols="60" class="border shadow-md rounded-md max-w-xl h-44 mt-2 p-2 text-lg" placeholder="例)服装は自由です。当日は交通機関をご利用ください。">{{ old('detail') }}</textarea>
                         </label>
                    </div>
               </div>


               {{ csrf_field() }}

               <button class="btn mt-12 mx-auto rounded-3xl border border-gray-400 flex justify-around w-36 py-2 bg-white text-gray-600 hover:bg-blue-500 hover:text-white">完了</button>
               </form>
          </div>
     </div>
</div>


@endsection