<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'title' => [
                'required',
                'string',
                Rule::unique('books')->where(function ($query) {
                    return $query->where('title', $this->input('title'))
                                 ->where('author', $this->input('author'));
                }),
            ],
            'author' => ['required', 'string'],
        ];
    }

    /**
     * Set custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.unique' => 'This book is already in your library'
        ];
    }    
}
