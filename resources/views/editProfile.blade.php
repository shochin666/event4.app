@extends('layouts.app')

@section('content')
<main class="flex justify-center py-10 px-8 h-screen">
   <div class="w-full mx-12 h-96">
   <p class="ml-10 lg:ml-32 xl:ml-32 text-5xl lg:text-2xl xl:text-2xl text-gray-500 pt-10 sm:font-thin md:font-thin lg:font-normal xl:font-normal mb-10">プロフィール編集
     </p>      
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
               <label for="name" class="text-gray-600"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">名前</span></label>
                  <input required id="name" name="name" type="text" value="{{ $user->name }}" class="border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4">
               <label for="email" class="mt-6 text-gray-600"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">メールアドレス</span></label>
                  <input required id="email" name="email" type="email" value="{{ $user->email }}" class="border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4  mb-96 lg:mb-0 xl:mb-0">
 
               <button type="submit" class="mt-96 lg:mt-16 xl:mt-16 mx-auto rounded-lg  lg:rounded-none xl:rounded-none sm:shadow-lg 
                md:shadow-lg lg:shadow-none xl:shadow-none bg-green-500 lg:bg-white xl:bg-white 2xl:bg-white w-4/5 border md:border-none xl:border-none border-gray-400 flex justify-around text-white
                lg:text-gray-600 xl:text-gray-600 2xl:text-gray-600 hover:text-gray-400 btn  whitespace-nowrap py-10 lg:py-0 xl:py-0 text-5xl lg:text-2xl xl:text-2xl font-light">変更</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection