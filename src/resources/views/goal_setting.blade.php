@extends('layouts.app')
@section('title', '目標体重設定')
@section('style')
<style>
    .goal-container {
        max-width: 500px;
        margin: 80px auto;
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .goal-title {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }
    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #444;
    }
    .form-input {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px 14px;
        border-radius: 8px;
        margin-bottom: 25px;
    }
    .btn-area {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }
    .btn-gray {
        padding: 10px 24px;
        background: #d4d4d4;
        border-radius: 8px;
        color: #333;
    }
    .btn-main {
        padding: 10px 24px;
        color: #fff;
        background: linear-gradient(to right, #c4b5fd, #f9a8d4);
        border-radius: 8px;
    }
</style>
@endsection
@section('content')
<div class="goal-container">
    <h1 class="goal-title">目標体重設定</h1>
    <form action="{{ route('weight_logs.goal_setting.store') }}" method="POST">
        @csrf
        <label class="form-label">目標体重</label>
        <input
            type="number"
            name="target_weight"
            step="0.1"
            class="form-input"
            value="{{ $target->target_weight ?? '' }}"
        >
        <div class="btn-area">
            <a href="{{ route('weight_logs.index') }}" class="btn-gray">戻る</a>
            <button type="submit" class="btn-main">
                更新
            </button>
        </div>
    </form>
</div>
@endsection
