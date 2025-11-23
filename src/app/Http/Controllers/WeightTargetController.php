<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\WeightTarget;

class WeightTargetController extends Controller
{
    //目標体重設定画面
    public function create()
    {
        $target = WeightTarget::where('user_id', Auth::id())->first();
        return view('weight_logs.goal_setting', compact('target'));
    }

    //保存処理（POST）
    public function store(Request $request)
    {
        $target = WeightTarget::where('user_id', Auth::id())->first();

        if ($target) {
            //更新
            $target->update([
                'target_weight' => $request->target_weight
            ]);
        } else {
            //新規
            WeightTarget::create([
                'user_id' => Auth::id(),
                'target_weight' => $request->target_weight,
            ]);
        }

        return redirect('/weight_logs');
    }
}
