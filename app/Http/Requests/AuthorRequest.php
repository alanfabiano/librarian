<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuthorRequest extends Request
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
        if( $this->method() == 'POST')
        {
            return [
                'name'      => 'required',
                'biography' => 'required',
                'photo'     => 'required|mimes:jpeg'
            ];
        }

        if( $this->method() == 'PUT' )
        {
            return [
                'name'      => 'required',
                'biography' => 'required',
                'photo'     => 'mimes:jpeg,png'
            ];
        }
    }
}
