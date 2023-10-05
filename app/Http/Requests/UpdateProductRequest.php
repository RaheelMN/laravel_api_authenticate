<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> ['required','regex:/^[\pL\s\.]+$/u','max:50'],
            'image' => ['image','mimes:jpeg,jpg,png,gif','max:15'],
            'description'=>['regex:/^[a-zA-Z]+[ ,.%+\-\(\)\'&a-zA-Z0-9]*$/u','max:250'],
            'price'=>['numeric','between:0,99999999.99'],
        ];
    }
}
