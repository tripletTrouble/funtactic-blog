<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:articles,id',
            'title' => 'required|string|min:10|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'thumbnail_url' => 'required|string|min:10|max:255',
            'thumbnail_source' => 'required|string|min:10|max:255',
            'body' => 'required|string'
        ];
    }
}
