<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return array();
                }
            case 'POST':
                {
                    return array(
                        'title'=>'required|unique:posts|min:3',
                        'content'=>'required|min:50',
                        'user_id'=>'required',
                      
                    );
                }
            case 'PUT':
                {

                    return array(
                        'title'=>'required|unique:posts|min:3',
                        'content'=>'required|min:50',
                        'user_id'=>'required',
                    );
                }
            case 'PATCH':

        }
    }
}
