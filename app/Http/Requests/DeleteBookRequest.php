<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class DeleteBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /**
         * This is a theoretical exercise. You can only run it if you actually have authenticated users. 
         * return $book && $this->user()->id === $book->user_id;
         */

         $book = $this->route('book');
         return $book && 1 === $book->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // No additional validation rules are needed for deleting a book
        // If necessary, rules can be added.
        return [
            //
        ];
    }
}
