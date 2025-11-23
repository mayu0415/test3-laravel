@section('style')
<style>
    /* モーダルの背景 */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        display: none;
        z-index: 100;
    }
    /* :target で表示 */
    #createModal:target {
        display: block;
    }
    /* モーダル本体 */
    .modal-window {
        max-width: 650px;
        margin: 80px auto;
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        position: relative;
        animation: fadeIn 0.2s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .modal-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 25px;
    }
    .form-row {
        margin-bottom: 20px;
    }
    .form-label {
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
    }
    .required-tag {
        display: inline-block;
        background: #ef4444;
        color: #fff;
        font-size: 11px;
        padding: 2px 6px;
        border-radius: 4px;
        margin-left: 6px;
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
    /* バリデーション */
    .error-msg {
        margin-top: 6px;
        font-size: 13px;
        color: #ef4444;
    }
</style>
@endsection

@section('content')
{{-- モーダル（JavaScriptなし） --}}
<div id="createModal" class="modal-overlay">
    <div class="modal-window">
        <h1 class="modal-title">Weight Logを追加</h1>
        <form action="{{ route('weight_logs.store') }}" method="POST">
            @csrf
            {{-- 日付 --}}
            <div class="form-row">
                <label class="form-label">日付
                    <span class="required-tag">必須</span>
                </label>
                <input type="date" name="date" class="form-input" value="{{ old('date') }}">
                @error('date')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            {{-- 体重 --}}
            <div class="form-row">
                <label class="form-label">体重
                    <span class="required-tag">必須</span>
                </label>
                <input type="number" step="0.1" name="weight" class="form-input"
                    value="{{ old('weight') }}">
                @error('weight')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            {{-- 摂取カロリー --}}
            <div class="form-row">
                <label class="form-label">摂取カロリー
                    <span class="required-tag">必須</span>
                </label>
                <input type="number" name="calories" class="form-input"
                    value="{{ old('calories') }}">
                @error('calories')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            {{-- 運動時間 --}}
            <div class="form-row">
                <label class="form-label">運動時間
                    <span class="required-tag">必須</span>
                </label>
                <input type="time" name="exercise_time" class="form-input"
                    value="{{ old('exercise_time') }}">
                @error('exercise_time')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            {{-- 運動内容 --}}
            <div class="form-row">
                <label class="form-label">運動内容</label>
                <textarea name="exercise_content" class="form-textarea">{{ old('exercise_content') }}</textarea>
                @error('exercise_content')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            <div class="btn-area">
                {{-- モーダルを閉じる --}}
                <a href="#" class="btn-gray">戻る</a>
                <button type="submit" class="btn-main">
                    登録
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
