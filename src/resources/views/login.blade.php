@extends('layouts.auth')

@section('subtitle', 'ログイン')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}">
            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password" placeholder="パスワードを入力">
            @error('password')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">ログイン</button>

        <div class="link-area">
            <a href="/register/step1">アカウント作成はこちら</a>
        </div>
    </form>
@endsection