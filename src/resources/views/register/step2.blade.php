@extends('layouts.auth')

@section('subtitle', 'STEP2 体重データの入力')

@section('content')
    <form action="{{ route('step2.post') }}" method="POST">
        @csrf

        <div class="form-group kg-wrapper">
            <label>現在の体重</label>
            <input type="text" name="current_weight" placeholder="現在の体重を入力" value="{{ old('current_weight') }}">
            <span class="kg-label">kg</span>
            @error('current_weight')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group kg-wrapper">
            <label>目標の体重</label>
            <input type="text" name="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}">
            <span class="kg-label">kg</span>
            @error('target_weight')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">アカウント作成</button>

    </form>

    <div class="link-area">
        <a href="/login">ログインはこちら</a>
    </div>
@endsection







