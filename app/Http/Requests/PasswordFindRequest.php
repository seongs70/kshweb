<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordFindRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'userId' => 'required|min:4|max:255',
            'name' => 'required|min:2|max:30',
            'email' => 'required|max:200|regex:/^.+@.+$/i',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute 필수 입력 항목입니다.',
            'min' => ':attribute 최소 :min 글자 이상이 필요합니다..',
            'max' => ':attribute 최대 :max 글자 이하만 가능합니다..',
        ];
    }
    public function attributes()
    {
        return [
            'userId' => '아이디',
            'name' => '이름',
            'email' => '이메일',
        ];
    }
}
