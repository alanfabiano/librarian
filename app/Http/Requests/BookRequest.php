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
        return [
            'title'   => 'required|min: 8',
            'resume'     => 'required',
            'book_cover' => 'required|mimes:jpeg',
            'author'     => 'required',
            'category'   => 'required'
        ];
    }
}
