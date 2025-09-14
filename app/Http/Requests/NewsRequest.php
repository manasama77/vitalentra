<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
        $newsId = $this->route('id');

        return [
            'title_ind' => 'required|string|max:255',
            'title_eng' => 'required|string|max:255',
            'slug_ind' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('news', 'slug_ind')->ignore($newsId),
            ],
            'slug_eng' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('news', 'slug_eng')->ignore($newsId),
            ],
            'content_ind' => 'required|string',
            'content_eng' => 'required|string',
            'publish_date' => 'required|date',
            'category' => 'required|in:blog,news,press release',
            'image' => $newsId ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'title_ind.required' => 'Indonesian title is required.',
            'title_eng.required' => 'English title is required.',
            'slug_ind.required' => 'Indonesian slug is required.',
            'slug_ind.regex' => 'Indonesian slug must contain only lowercase letters, numbers, and hyphens.',
            'slug_ind.unique' => 'Indonesian slug already exists.',
            'slug_eng.required' => 'English slug is required.',
            'slug_eng.regex' => 'English slug must contain only lowercase letters, numbers, and hyphens.',
            'slug_eng.unique' => 'English slug already exists.',
            'content_ind.required' => 'Indonesian content is required.',
            'content_eng.required' => 'English content is required.',
            'publish_date.required' => 'Publish date is required.',
            'publish_date.date' => 'Publish date must be a valid date.',
            'category.required' => 'Category is required.',
            'category.in' => 'Category must be one of: blog, news, press release.',
            'image.required' => 'Image is required.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Image must be of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'Image size must not exceed 10MB.',
        ];
    }
}
