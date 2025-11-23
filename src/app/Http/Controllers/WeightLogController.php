<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ModalRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\GoalSettingRequest;

class WeightLogController extends Controller
{
    
    public function index()
    {

        $userId = Auth::id();

        $target = WeightTarget::where('user_id', $userId)->first();

        if (!$target) {
        $target = WeightTarget::create([
            'user_id' => $userId,
            'target_weight' => null, 
        ]);
        }

        $latestWeight = WeightLog::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->value('weight');

        $difference = null;
        if ($target->target_weight !== null && $latestWeight !== null) {
            $difference = $latestWeight - $target->target_weight;
        }
        
        $logs = WeightLog::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->paginate(8);
        return view('index', compact(
            'logs',
            'target',
            'latestWeight',
            'difference'
        ));
    }
    
    public function store(ModalRequest $request)
    {
        WeightLog::create([
            'user_id'          => Auth::id(),
            'date'             => $request->date,
            'weight'           => $request->weight,
            'calories'         => $request->calories,
            'exercise_time'    => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);
        return redirect()->route('weight_logs.index')
            ->with('success', '登録が完了しました！');
    }
    
    public function edit($weightLogId)
    {
        $log = WeightLog::where('id', $weightLogId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        return view('edit', compact('log'));
    }
    
    public function update(EditRequest $request, $weightLogId)
    {
        $log = WeightLog::where('id', $weightLogId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $log->update([
            'date'             => $request->date,
            'weight'           => $request->weight,
            'calories'         => $request->calories,
            'exercise_time'    => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);
        return redirect()->route('weight_logs.index')
            ->with('success', '更新しました！');
    }
    
    public function deleteConfirm($weightLogId)
    {
        $log = WeightLog::where('id', $weightLogId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        return view('weight_logs.delete', compact('log'));
    }
    
    public function destroy($weightLogId)
    {
        $log = WeightLog::where('id', $weightLogId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $log->delete();
        return redirect()->route('weight_logs.index')
            ->with('success', '削除しました！');
    }
    
    public function search(Request $request)
    {
        $userId = Auth::id();
        $from = $request->from;
        $to   = $request->to;
        $query = WeightLog::where('user_id', $userId)
            ->orderBy('date', 'desc');
        if ($from && $to) {
            $query->whereBetween('date', [$from, $to]);
        }
        $logs = $query->paginate(8);
        $searchCount = $logs->total();
        $target = WeightTarget::where('user_id', $userId)->first();
        $latestWeight = WeightLog::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->value('weight');
        return view('index', compact(
            'logs',
            'target',
            'latestWeight',
            'searchCount',
            'from',
            'to'
        ));
    }
    
    public function goalSetting()
    {
        $userId = Auth::id();
        $target = WeightTarget::where('user_id', $userId)->first();
        return view('goal_setting', compact('target'));
    }
    
    public function goalSettingStore(GoalSettingRequest $request)
    {
        $userId = Auth::id();
        WeightTarget::updateOrCreate(
            ['user_id' => $userId],
            ['target_weight' => $request->target_weight]
        );
        return redirect()->route('weight_logs.index')
            ->with('success', '目標体重を更新しました！');
    }
}










