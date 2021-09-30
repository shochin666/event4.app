@extends('layouts.app')

@section('content')
<!-- エラーメッセージ日本語化 -->
<main class="flex justify-center py-10 px-8 h-screen bg-blue-50">
   <div class="bg-white w-full mx-12 h-96">
      <p class="ml-20 text-2xl text-gray-500 mt-10">プロフィール編集</p>
      <div>
         @if($errors->any())
         <div class="alert alert-danger">
            <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
            </ul>
         </div>
         <div>
         @endif
            <form method="POST" action="{{ route('update') }}" class="flex flex-col max-w-lg mx-auto mt-12 mb-20">
               
               @csrf
               <label for="name" class="text-gray-600">名前</label>
                  <input required id="name" name="name" type="text" value="{{ $user->name }}" class="border shadow-md rounded-md text-lg pl-2 py-1">
               <label for="email" class="mt-6 text-gray-600">メールアドレス</label>
                  <input required id="email" name="email" type="email" value="{{ $user->email }}" class="border shadow-md rounded-md text-lg pl-2 py-1">
               <!-- <label for="password">パスワード</label>
                  <input id="password" name="password" type="password" value="{{ $user->password }}"> -->
                  <!-- 削除ボタンの実装 -->
               <button type="submit" class="btn mt-12 lg:mt-12 xl:mt-12 mx-auto rounded-3xl lg:rounded-md xl:rounded-md border border-gray-400 flex justify-around w-36 py-2 bg-blue-500 xl:bg-white lg:bg-white text-white lg:text-gray-600 xl:text-gray-600 lg:hover:bg-gray-400 xl:hover:bg-gray-400 lg:hover:text-white xl:hover:text-white">変更</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection