<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|string|max:225',
            'date' => 'required|date|after_or_equal:today',
            'detail' => 'nullable|string|max:225',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'title.string' => 'タイトルは文字列で入力してください。',
            'title.max' => 'タイトルを225文字以内で入力してください。',
            'date.required' => '日付は必須です。',
            'date.date' => '日付を有効な日付で入力してください。',
            'date.after_or_equal' => '日付を今日以降の日付で入力してください。',
            'detail.string' => '詳細を文字列で入力してください。',
            'detail.max' => '詳細を225文字以内で入力してください。'
        ];
    }
}
