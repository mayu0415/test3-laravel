@extends('layouts.auth')

@section('subtitle', 'STEP1 アカウント情報の登録')

@section('content')
    <form action="{{ route('step1.post') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>お名前</label>
            <input type="text" name="name" placeholder="名前を入力" value="{{ old('name') }}">
            @error('name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

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

        <button type="submit">次に進む</button>

    </form>
    
    <div class="link-area">
        <a href="/login">ログインはこちら</a>
    </div>
@endsection