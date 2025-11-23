@extends('layouts.app')
@section('title', 'Weight Log 編集')
@section('style')
    <style>
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .form-title {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #444;
        }
        .form-input,
        .form-textarea {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px 14px;
            border-radius: 8px;
        }
        .form-textarea {
            resize: vertical;
            height: 120px;
        }
        .form-row {
            margin-bottom: 20px;
        }
        .btn-area {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .btn-gray {
            padding: 10px 24px;
            background: #d4d4d4;
            border-radius: 8px;
        }
        .btn-main {
            padding: 10px 24px;
            color: #fff;
            border-radius: 8px;
            background: linear-gradient(to right, #c4b5fd, #f9a8d4);
        }
        .btn-danger {
            padding: 10px 24px;
            color: #fff;
            border-radius: 8px;
            background: #ef4444;
        }
    </style>
@endsection
@section('content')
<div class="form-container">
    <h1 class="form-title">Weight Log 編集</h1>
    <form action="{{ route('weight_logs.update', $log->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- 日付 --}}
        <div class="form-row">
            <label class="form-label">日付</label>
            <input type="date" name="date" class="form-input" value="{{ $log->date }}">
        </div>
        {{-- 体重 --}}
        <div class="form-row">
            <label class="form-label">体重</label>
            <input type="number" step="0.1" name="weight" class="form-input" value="{{ $log->weight }}">
        </div>
        {{-- 摂取カロリー --}}
        <div class="form-row">
            <label class="form-label">摂取カロリー</label>
            <input type="number" name="calories" class="form-input" value="{{ $log->calories }}">
        </div>
        {{-- 運動時間 --}}
        <div class="form-row">
            <label class="form-label">運動時間</label>
            <input type="time" name="exercise_time" class="form-input" value="{{ $log->exercise_time }}">
        </div>
        {{-- 運動内容 --}}
        <div class="form-row">
            <label class="form-label">運動内容</label>
            <textarea name="exercise_content" class="form-textarea">{{ $log->exercise_content }}</textarea>
        </div>
        <div class="btn-area">
            <a href="{{ route('weight_logs.index') }}" class="btn-gray">戻る</a>
            <button type="submit" class="btn-main">
                更新
            </button>
            <a href="{{ route('weight_logs.deleteConfirm', $log->id) }}" class="btn-danger">
                削除
            </a>
        </div>
    </form>
</div>
@endsection