<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:tags'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required.',
            'name.unique' => 'This field must be unique.',
            'name.min' => 'This field must be at least 3 characters long.',
        ];
    }
}
