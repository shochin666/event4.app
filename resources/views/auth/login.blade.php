@extends('layouts.app')

@section('content')
<div class="justify-center mx-64 flex flex-col">
<p class="text-2xl text-gray-500 pt-10">ログイン
</p>
    <div class="mt-10 flex justify-center">
        <div class="w-full max-w-lg">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-8">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="text-gray-600">メールアドレス</span></label>

                            <div class="">
                                <input id="email" type="email" class="py-1 text-lg pl-2 border shadow-md w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><span class="text-gray-600">パスワード</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="py-1 text-lg pl-2 border shadow-md w-full form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                <div class="form-group">
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('IDとパスワードを保存') }}
                                            </label>
                                        </div>
                                        <div class="form-group mt-12">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn flex justify-center mx-auto hover:text-gray-400"><span>ログイン</span>
                                                </button>
</br>

                                                @if (Route::has('password.request'))
                                                    <a class="hover:text-gray-400 mt-10 btn btn-link flex justify-center mx-auto underline" href="{{ route('password.request') }}">
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
