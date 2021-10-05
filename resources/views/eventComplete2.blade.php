@csrf
@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-44">
     <div class="flex flex-col">
          <p class="text-2xl mb-16 text-gray-600">削除しました</p>
          <a href="/created_event" class="btn mt-12 mx-auto rounded-3xl  border lg:border-0 xl:border-0 bg-white flex justify-around py-2 "><span class="text-gray-600 hover:text-gray-400">戻る</span></a>
     </div>
</div>

@endsection