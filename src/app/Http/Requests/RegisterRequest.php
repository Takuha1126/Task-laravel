<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required||min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須です。',
            'name.string' => '名前を文字列で入力してください。',
            'name.max' => '名前を15文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'email.unique' => 'このメールアドレスはすでに使用されています。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードを8文字以上で入力してください。'

        ];
    }
}
