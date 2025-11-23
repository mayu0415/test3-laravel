<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PiGLy</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Hiragino Sans', 'Noto Sans JP', sans-serif;
            background: linear-gradient(135deg, #f9c5d1, #f78fd7, #fba169);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card-wrapper {
            background: white;
            width: 420px;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .logo-title {
            font-size: 40px;
            font-weight: bold;
            color: #d44dd4;
            margin-bottom: 10px;
        }
        .subtitle {
            font-size: 18px;
            margin-bottom: 25px;
            color: #555;
        }
        .form-group {
            text-align: left;
            margin-bottom: 18px;
        }
        .kg-wrapper {
            position: relative;
        }
        .kg-label {
            position: absolute;
            right: 0px;
            top: 70%;
            transform: translateY(-50%);
            color: #333;
            font-size: 16px;
            pointer-events: none;
        }
        label {
            font-weight: bold;
            color: #444;
        }
        input {
            width: 87%;
            padding: 12px;
            font-size: 15px;
            margin-top: 7px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #b05afc, #f54fb6);
            color: white;
            font-size: 17px;
            cursor: pointer;
        }
        .link-area {
            margin-top: 20px;
        }
        .link-area a {
            color: #6a55ff;
            text-decoration: none;
            font-size: 14px;
        }
        .error-text {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        
    </style>
</head>

<body>
    <div class="card-wrapper">
        <div class="logo-title">PiGLy</div>
        <div class="subtitle">@yield('subtitle')</div>

        @yield('content')
    </div>
</body>
</html>








