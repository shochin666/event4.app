@csrf
@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-72 lg:mt-56 xl:mt-56">
     <div class="flex flex-col">
          <p class="text-6xl lg:text-2xl xl:text-2xl mb-96 lg:mb-16 xl:mb-16 text-gray-600">完了しました！</p>
          <a href="/home" class="btn mt-12 mx-auto lg:border-0 xl:border-0 bg-white flex justify-around py-2 "><span class="text-gray-500  md:hover:bg-indigo-100 lg:hover:bg-indigo-100 xl:hover:bg-indigo-100 btn  whitespace-nowrap py-0 text-5xl lg:text-2xl xl:text-2xl font-light mt-96 lg:mt-40 xl:mt-40 lg:mb-0 xl:mb-0">戻る</span></a>
     </div>
</div>

@endsection