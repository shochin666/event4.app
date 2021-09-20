@csrf
@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-20">
     <div class="flex flex-col">
          <p class="text-2xl mb-16 text-gray-600">完了しました</p>
          <a href="/home" class="btn mt-12 mx-auto rounded-3xl  lg:rounded-md xl:rounded-md border lg:border-0 xl:border-0 bg-white border-gray-400 flex justify-around w-36 py-2 text-gray-600 hover:bg-gray-400 hover:text-white">戻る</a>
     </div>
</div>

@endsection