@extends('layouts.app')

@section('content')

<div class="justify-center mx-64 flex flex-col">
<p class="text-2xl text-gray-500 pt-10">会員登録
</p>
    <div class="mt-10 flex justify-center">
        <div class="w-full max-w-lg">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-8">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><span class="text-gray-600">名前</span></label>
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror py-1 text-lg pl-2 border shadow-md w-full" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-8">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="text-gray-600">メールアドレス</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror py-1 text-lg pl-2 border shadow-md w-full" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-8">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="text-gray-600">パスワード</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror py-1 text-lg pl-2 border shadow-md w-full" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="text-gray-600">パスワード再確認</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control py-1 text-lg pl-2 border shadow-md w-full" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mt-12 btn flex justify-center mx-auto hover:text-gray-400"><span>完了</span></button>
                            </div>
                        </div>

                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

