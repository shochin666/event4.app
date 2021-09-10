@csrf
@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-20">
     <div class="flex flex-col">
          <p class="text-2xl mb-16">完了しました！</p>
          <a href="/home" class="btn btn-success mt-12 rounded-3xl border border-gray-400 flex justify-around w-36 py-2 bg-white text-gray-600 hover:bg-gray-400 hover:text-white mr-0 shadow-md ml-2">戻る</a>
     </div>
</div>

@endsection