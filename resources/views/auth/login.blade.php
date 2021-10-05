@extends('layouts.app')

@section('content')
<div class="justify-center mx-20 lg:mx-64 xl:mx-64 flex flex-col">
<p class="mt-16 lg:mt-32 xl:mt-32 ml-0 lg:ml-8 xl:ml-8 text-5xl lg:text-2xl xl:text-2xl text-gray-500 pt-10 sm:font-thin md:font-thin lg:font-normal xl:font-normal">ログイン</p>
    <div class="mt-32 lg:mt-10 xl:mt-10 flex justify-center">
        <div class="w-full lg:max-w-lg xl:max-w-lg">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-8">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">メールアドレス</span></label>

                            <div class="mb-20 lg:mb-0 xl:mb-0">
                                <input id="email" type="email" class="border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><span class="mr-2 text-gray-600 my-auto  whitespace-nowrap text-4xl lg:text-lg xl:text-lg font-extralight lg:font-normal xl:font-normal">パスワード</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="border rounded-md h-20 lg:h-10 xl:h-10 shadow-md w-full lg:w-88 xl:w-88 text-4xl lg:text-lg xl:text-lg font-light mx-auto pl-4 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                <div class="form-group">
                                    <div class="">
                                        <div class="form-check text-2xl lg:text-sm xl:text-sm">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('IDとパスワードを保存') }}
                                            </label>
                                        </div>
                                        <div class="form-group mt-12">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="mt-56 lg:mt-20 xl:mt-20 mx-auto rounded-lg  lg:rounded-none xl:rounded-none sm:shadow-lg 
                md:shadow-lg lg:shadow-none xl:shadow-none bg-blue-500 lg:bg-white xl:bg-white 2xl:bg-white w-full border md:border-none xl:border-none border-gray-400 flex justify-around text-white
                lg:text-gray-600 xl:text-gray-600 2xl:text-gray-600 hover:text-gray-400 btn  whitespace-nowrap py-10 lg:py-0 xl:py-0 text-5xl lg:text-2xl xl:text-2xl font-light"><span>ログイン</span>
                                                </button>
</br>

                                                @if (Route::has('password.request'))
                                                    <a class="hover:text-gray-400 mt-10  btn btn-link flex justify-center mx-auto no-underline lg:underline xl:underline text-3xl lg:text-sm xl:text-sm" href="{{ route('password.request') }}">
                                                        パスワードを忘れた方はこちら
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
