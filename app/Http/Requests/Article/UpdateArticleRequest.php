<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
            'title' => 'required|min:3',
            'slug' => ['required','min:3', Rule::unique('articles')->ignore($this->id)],
            'tag.*' => 'exists:tags,id',
            'category.*' => 'exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field is required.',
            'title.min' => 'This field must be at least 3 characters long.',
            'slug.required' => 'This field is required.',
            'slug.unique' => 'This field must be unique.',
        ];
    }
}
