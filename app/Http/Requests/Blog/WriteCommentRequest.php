<?php namespace App\Http\Requests\Blog;

use App\Http\Requests\BaseRequest;

class WriteCommentRequest extends BaseRequest
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
            'blog_id' => 'required',
            'comment_name' => 'required|min:1',
            'comment_body' => 'required|min:1',
            
        ];
    }

    public function messages()
    {
        return [
            'blog_id.required' => '',
            'comment_name.required' => 'Please input your name',
            'comment_body.required' => 'Please input comment',
        ];
    }
}
