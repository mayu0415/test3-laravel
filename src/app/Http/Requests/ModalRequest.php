<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 日付
            'date' => ['required', 'date'],

            // 体重
            'weight' => [
                'required',
                'numeric',
                'regex:/^\d{1,3}(\.\d)?$/'  // 4 桁以内 ＆ 小数点 1桁
            ],

            // 摂取カロリー
            'calories' => ['required', 'numeric'],

            // 運動時間（00:00 形式）
            'exercise_time' => ['required', 'regex:/^\d{2}:\d{2}$/'],

            // 運動内容（任意・最大120文字）
            'exercise_content' => ['nullable', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            // 日付
            'date.required' => '日付を入力してください',

            // 体重
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',

            // カロリー
            'calories.required' => '摂取カロリーを入力してください',
            'calories.numeric' => '数字で入力してください',

            // 運動時間
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_time.regex' => '時間は「00:00」の形式で入力してください',

            // 運動内容
            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }
}
