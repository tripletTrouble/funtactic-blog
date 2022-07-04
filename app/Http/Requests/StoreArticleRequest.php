<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:articles,title|string|min:10|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'excerpt' => 'required|string|min:10|max:255',
            'body' => 'required|string',
            'tags' => 'nullable|string|max:255',
            'thumbnail_image' => 'required|image|file|max:400|dimensions:max_width=1280,max_height=720',
            'thumbnail_credit' => 'nullable|string|min:10',
        ];
    }
}
