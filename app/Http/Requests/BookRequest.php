<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookRequest extends Request
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
                'title'   => 'required',
                'resume'     => 'required',
                'book_cover' => 'required|mimes:jpeg',
                'author_id'     => 'required',
                'category_id'   => 'required'
            ];
        }

        if( $this->method() == 'PUT' )
        {
            return [
                'title'   => 'required',
                'resume'     => 'required',
                'book_cover' => 'mimes:jpeg',
                'author_id'     => 'required',
                'category_id'   => 'required'
            ];
        }
    }
}
