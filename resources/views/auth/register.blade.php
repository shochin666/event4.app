@extends('layouts.app')

@section('content')

<div class="justify-center mx-20 lg:mx-64 xl:mx-64 flex flex-col">
<p class="mb-16 lg:mb-0 xl:mb-0 mt-16 lg:mt-32 xl:mt-32 ml-0 lg:ml-8 xl:ml-8 text-5xl lg:text-2xl xl:text-2xl text-gray-500 pt-10 sm:font-thin md:font-thin lg:font-normal xl:font-normal">会員登録
</p>
    <div class="mt-10 flex justify-center">
        <div class="w-full lg:max-w-lg xl:max-w-lg">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-12">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">名前</span></label>
                            <div class="form-group row">

                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-12">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">メールアドレス</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-12">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">パスワード</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">パスワード再確認</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mt-56 lg:mt-20 xl:mt-20 mx-auto rounded-lg  lg:rounded-none xl:rounded-none sm:shadow-lg 
                md:shadow-lg lg:shadow-none xl:shadow-none bg-green-500 lg:bg-white xl:bg-white 2xl:bg-white w-full border md:border-none xl:border-none border-gray-400 flex justify-around text-white
                lg:text-gray-600 xl:text-gray-600 2xl:text-gray-600 hover:text-gray-400 btn  whitespace-nowrap py-10 lg:py-0 xl:py-0 text-5xl lg:text-2xl xl:text-2xl font-light"><span>完了</span></button>
                            </div>
                        </div>

                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
