<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // $validatedData = $request->validate([
            'userId' => 'required|unique:users|min:4|max:255',
            'password' => 'required|min:4|max:255',
            'name' => 'required|min:2|max:30',
            'nickName' => 'required|min:2|max:30',
            'email' => 'required|max:200|regex:/^.+@.+$/i',
            //'remember_token' => 'unique:remember_token'
        //]); 
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute 필수 입력 항목입니다.',
            'min' => ':attribute 최소 :min 글자 이상이 필요합니다..',
            'max' => ':attribute 최대 :max 글자 이하만 가능합니다..',
            'unique' => ':attribute 이미 존재합니다'
        ];
    }
    public function attributes()
    {
        return [
            'userId' => '아이디',
            'password' => '패스워드',
            'name' => '이름',
            'nickName' => '닉네임',
            'email' => '이메일',
            //'remember_token' => '',
        ];
    }
}
