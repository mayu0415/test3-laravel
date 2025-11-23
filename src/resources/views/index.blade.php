@extends('layouts.app')
{{-- ページ専用CSS --}}
@section('css')
<style>
    /*  上部3つのカード  */
    .summary-cards {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }
    .summary-card {
        flex: 1;
        background: white;
        padding: 25px;
        border-radius: 12px;
        text-align: center;
    }
    .summary-card-title {
        color: #666;
        margin-bottom: 5px;
        font-size: 14px;
    }
    .summary-card-value {
        font-size: 40px;
        font-weight: 700;
    }
    /*  検索フォーム  */
    .search-box {
        background: white;
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 25px;
    }
    .search-form {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .search-info {
        margin-top: 15px;
        color: #666;
    }
    /*  テーブル  */
    .log-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }
    .log-table th {
        background: #fafafa;
        padding: 14px;
        border-bottom: 1px solid #eee;
    }
    .log-table td {
        padding: 14px;
        border-bottom: 1px solid #eee;
    }
    .table-row:hover {
        background-color: #f3f3f3;
        cursor: pointer;
        transition: 0.2s;
    }
    /* pencil icon */
    .pencil-icon {
        width: 20px;
    }
</style>
@endsection
{{-- ページ本体 --}}
@section('content')
{{-- 上段の3つのカード --}}
<div class="summary-cards">
    <div class="summary-card">
        <div class="summary-card-title">目標体重</div>
        <div class="summary-card-value">
            {{ $target ? number_format($target->target_weight, 1) . 'kg' : '未設定' }}
        </div>
    </div>
    <div class="summary-card">
        <div class="summary-card-title">目標まで</div>
        <div class="summary-card-value">
            {{ ($target && $latestWeight !== null)
                ? number_format($latestWeight - $target->target_weight, 1) . 'kg'
                : '-' }}
        </div>
    </div>
    <div class="summary-card">
        <div class="summary-card-title">最新体重</div>
        <div class="summary-card-value">
            {{ $latestWeight !== null ? number_format($latestWeight, 1) . 'kg' : '-' }}
        </div>
    </div>
</div>
{{-- 検索ボックス --}}
<div class="search-box">
    <form method="GET" action="{{ route('weight_logs.search') }}" class="search-form">
        @csrf
        <input type="date" name="from" class="hover" value="{{ request('from') }}">
        <span>〜</span>
        <input type="date" name="to" class="hover" value="{{ request('to') }}">
        <button class="btn-grey hover" type="submit">検索</button>
        @if(request('from') && request('to'))
            <a href="{{ route('weight_logs.index') }}" class="btn-grey hover">リセット</a>
        @endif
        <a href="#createModal" class="add-btn">データ追加</a>
    </form>
    {{-- 検索結果の件数表示 --}}
    @if(isset($searchCount))
    <p class="search-info">
        {{ request('from') }} 〜 {{ request('to') }} の検索結果　{{ $searchCount }}件
    </p>
    @endif
</div>
{{-- 一覧テーブル --}}
<table class="log-table">
    <tr>
        <th>日付</th>
        <th>体重</th>
        <th>食事摂取カロリー</th>
        <th>運動時間</th>
        <th></th>
    </tr>
    @foreach($logs as $log)
    <tr class="table-row">
        <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
        <td>{{ number_format($log->weight,1) }}kg</td>
        <td>{{ $log->calories }}cal</td>
        <td>{{ $log->exercise_time }}</td>
        <td>
            <a href="{{ route('logs.edit', $log->id) }}">
                <img src="/img/pencil.png" class="pencil-icon hover">
            </a>
        </td>
    </tr>
    @endforeach
</table>
{{-- ページネーション --}}
<div style="margin-top: 20px;">
    {{ $logs->links() }}
</div>
@endsection
