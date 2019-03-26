<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'commentContent' => ['required', 'min:2'],
           
        ];
    }
    
     public function messages()
    {
        return [
            'required' => ':attribute 필수 입력 항목입니다.',
            'min' => ':attribute 최소 :min 글자 이상이 필요합니다..',
        ];
    }
    
    public function attributes()
    {
        return [
            'commentContent' => '댓글 내용',
        ];
    }
    
}
