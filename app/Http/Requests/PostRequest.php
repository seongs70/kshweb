<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $dontFlash = ['files'];
    
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
            'postName' => ['required','min:2'],
            'postContent' => ['required'],
            'files' => ['array'],
            'files.*' => ['mimes:jpg,png,zip,tar', 'max:30000'],
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
            'postName' => '제목',
            'postContent' => '본문',
        ];
    }
    
    
}
