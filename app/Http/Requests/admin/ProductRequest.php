<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                        'name'=>'required',
                        'price'=>'required',
                        'quantity'=>'required',
                        'description'=>'required',
                        'categories'=>'required',
                        'images'=>'required|mimes:jpeg,bmp,png,gif,jpg|max:5000',


                    );
                }
            case 'PUT':
                {

                    return array(
                        'name'=>'required',
                        'price'=>'required',
                        'quantity'=>'required',
                        'description'=>'required',
                        'categories'=>'required',
                        'images'=>'required|mimes:jpeg,bmp,png,gif,jpg|max:5000',
                    );
                }
            case 'PATCH':

        }
    }
}
