@extends('layouts.app')

@section('content')

<div class="justify-center mx-64 flex flex-col">
    <p class="text-2xl text-gray-500 pt-10">パスワード再設定
    </p>
    <div class="mt-12 lg:mt-40 xl:mt-40 flex justify-center">
        <div class="w-full max-w-lg">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-gray-600">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="py-1 text-lg pl-2 border shadow-md w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-12">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn flex justify-center mx-auto hover:text-gray-400"><span>送信</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
