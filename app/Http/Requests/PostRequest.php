<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * PostsControllerにてupdateメソッドとstoreメソッドの
 * ヴァリデーションが重複していたので、こちらの
 * PostRequestを作成し、ここで設定することでその重複を解消した
 */

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /** ここは認証関連の設定を行う */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /** ここで、重複ヴァリデーションの解消のためのせっていを行う */
    public function rules() {
        return [
            //
            'title' => 'required|min:3',
            'body'  => 'required|min:5'
        ];
    }

    /** エラーメッセージのカスタマイズ */
    public function messages() {
        return [
            //
            'title.required' => 'タイトルは3文字以上で入力してねい！',
            'body.required'  => '内容は5文字以上で入力してねい！'
        ];
    }
}
