@extends('layouts.app')

@section('content')
<div class="">
     <div class="py-20 px-0 lg:mx-20 xl:px-20">
     <p class="ml-20 lg:ml-32 xl:ml-32 text-5xl lg:text-2xl xl:text-2xl text-gray-500 pt-0 sm:font-thin md:font-thin lg:font-normal xl:font-normal mb-10">イベント作成
     </p>

          <div class="h-16">
               <!-- space -->
          </div>

          <div class="">

               
                    @if ($errors->any())
                    <div class="mx-80 rounded-md border-2 border-red-300 bg-red-50 mb-10 py-4 px-10 text-gray-600">
                    <ul class="mx-4">
                         @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    @endif
                    </div>
         

               <form action="{{ route('setEvent.post') }}" method="POST" class="flex flex-col justify-center">
               @csrf
               <div class="flex justify-center mx-24 lg:mx-64 xl:mx-96 lg:flex-row xl:flex-row flex-col">
                    <div class="px-auto flex flex-col mr-0 lg:mr-10 xl:mr-10">
                              <label class="event_name mb-24 lg:mb-5 xl:mb-5 flex flex-col lg:flex-row xl:flex-row lg:justify-between xl:justify-between justify-center">
                                   <span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">イベント名</span>
                                   <input maxlength="14" required class="border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-60 xl:w-60 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4" name="name" type="text" value="{{ old('name') }}">
                              </label>
                              <label class="flex flex-col lg:flex-row xl:flex-row mb-24 lg:mb-5 xl:mb-5 lg:justify-between xl:justify-between justify-center">
                                   <span class="block container my-auto mr-2 w-auto text-gray-600 text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal whitespace-nowrap">開催日</span>
                                   <input required class=" ml-0 lg:ml-2 xl:ml-2 border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-68 xl:w-68 px-4 text-4xl lg:text-lg xl:text-lg font-light mx-auto text-gray-600 bg-white" type="date" name="date" value="{{ old('date') }}">
                              </label>
                              <label class="event_name flex flex-col lg:flex-row xl:flex-row lg:justify-between xl:justify-between justify-center mb-24 lg:mb-0 xl:mb-0">
                              <span class="text-gray-600 mr-2 my-auto text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal whitespace-nowrap">開催場所</span>
                              <input maxlength="15" required class="mx-auto border shadow-md rounded-md h-20 lg:h-10 xl:h-10 text-4xl lg:text-lg xl:text-lg font-light pl-4 w-full lg:w-64 xl:w-64" name="place" type="text" value="{{ old('place') }}">
                         </label>
                              <label class="people flex flex-col lg:flex-row xl:flex-row lg:justify-between xl:justify-between justify-center mb-24 lg:mb-5 xl:mb-5 lg:mt-0 xl:mt-0">
                                   <span class="mr-2 text-gray-600 my-auto text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal whitespace-nowrap">募集人数</span>
                                   <div class="flex flex-col pt-0 lg:pt-5 xl:pt-5">
                                        <input min="1" required class="border shadow-md rounded-md h-20 lg:h-10 xl:h-10 text-4xl lg:text-lg xl:text-lg font-light  pl-4 focus:placeholder-white w-full lg:w-60 xl:w-60
                                         mx-auto" placeholder="例) 13" name="people" type="number" value="{{ old('people') }}">
                                        <span class="text-2xl lg:text-sm xl:text-sm text-gray-600 whitespace-nowrap mt-1 ml-1">半角英数字で入力</span>
                                   </div>
                              </label>
                    </div>
                    <div class="mt-8 lg:mt-0 xl:mt-0 sm:w-76 md:w-76 lg:ml-10 xl:ml-10 flex justify-center">
                         <!-- コメント欄を高さfullにしたい -->
                         <label class="event_name flex flex-col">
                              <span class="text-gray-600 whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">参加者に向けて(詳細等)</span>
                              <textarea required name="detail" rows="8" cols="60" class="border shadow-md rounded-md w-full lg:w-96 xl:w-96 h-96 lg:h-44 xl:h-44 mt-2 p-4 text-4xl lg:text-lg xl:text-lg font-light mx-auto" placeholder="例) 服装は自由です。当日は交通機関をご利用ください。">{{ old('detail') }}</textarea>
                         </label>
                    </div>
               </div>


               {{ csrf_field() }}
                    <div>
                    <button type="submit" class="mt-32 lg:mt-16 xl:mt-16 mx-auto rounded-lg  lg:rounded-none xl:rounded-none sm:shadow-lg 
                md:shadow-lg lg:shadow-none xl:shadow-none bg-blue-500 lg:bg-white xl:bg-white 2xl:bg-white w-4/5 border md:border-none xl:border-none border-gray-400 flex justify-around text-white
                lg:text-gray-600 xl:text-gray-600 2xl:text-gray-600 hover:text-gray-400 btn  whitespace-nowrap py-10 lg:py-0 xl:py-0 text-5xl lg:text-2xl xl:text-2xl font-light">完了</button>
                    </div>
               </form>
          </div>
     </div>
</div>


@endsection