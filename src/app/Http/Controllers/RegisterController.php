<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    // Step1 表示
    public function step1()
    {
        return view('register.step1');
    }

    // Step1 → Step2 へ進む
    public function postStep1(RegisterStep1Request $request)
    {
        
        // Step1 の内容をセッションに保存
        session([
            'register_step1' => [
                'register_name' => $request->name,
                'register_email' => $request->email,
                'register_password' => $request->password,
            ],
        ]);

        return redirect('/register/step2');
    }

    public function step2()
    {
        return view('register.step2');
    }

    public function postStep2(RegisterStep2Request $request)
    {

        // ユーザー作成
        $user = User::create([
            'name' => session('register_step1.register_name'),
            'email' => session('register_step1.register_email'),
            'password' => Hash::make(session('register_step1.register_password')),
        ]);

        // 体重目標テーブルに登録
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        // session の掃除
        session()->forget([
            'register_step1'
        ]);

        // ログインページへ
        return redirect('/login')->with('status', '登録が完了しました！ログインしてください。');

    }

}
