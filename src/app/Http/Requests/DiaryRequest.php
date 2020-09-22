<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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
            'category' => 'required',
            'date' => 'required|date',
            'text' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'カテゴリを選択してください',
            'date.required' => '日付を入力してください',
            'date.date' => '日付情報が不正です',
            'text.required' => '日記内容を入力してください',
            'text.max' => '日記内容は:max文字以下で入力してください'
        ];
    }
}
