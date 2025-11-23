<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PiGLy</title>
   
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Poppins', sans-serif;
        }
        /* ヘッダー */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: #ffffff;
            border-bottom: 1px solid #eee;
        }
        .logo {
            font-size: 32px;
            color: #d7a2f7;
            font-weight: 700;
        }
        .header-buttons {
            display: flex;
            gap: 15px;
        }
        /* グラデーションボタン */
        .btn-grad {
            background: linear-gradient(to right, #b8c0ff, #e9a6f7);
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-grey {
            background: #d9d9d9;
            color: #333;
            padding: 8px 18px;
            border-radius: 6px;
            text-decoration: none;
        }
        /* ページ本体 */
        .content {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }
        /* ホバー効果 */
        .hover:hover {
            opacity: 0.7;
            transition: 0.2s;
        }
        /* テーブル */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        table th {
            background: #fafafa;
            padding: 14px;
            border-bottom: 1px solid #eee;
        }
        table td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }
        /* モーダル背景 */
        .modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.45);
            display: none;
            justify-content: center;
            align-items: center;
        }
    </style>
    @yield('css')
</head>
<body>
<header>
    <div class="logo">PiGLy</div>
    <div class="header-buttons">
        <a href="{{ route('weight_logs.goal_setting') }}" class="btn-grey hover">目標体重設定</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-grey hover" type="submit">ログアウト</button>
        </form>
    </div>
</header>
<div class="content">
    @yield('content')
</div>
</body>
</html>