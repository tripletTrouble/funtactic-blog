<?php

namespace App\Http\Requests;

use App\Facades\Articles;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'uuid' => $this->route('uuid'),
            'id' => Articles::find($this->route('uuid'))->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->has('published')) {
            return [
                'published' => 'required'
            ];
        } else {
            return [
                'title' => [
                    'required',
                    Rule::unique('articles')->ignore($this->id),
                    'string',
                    'min:10',
                    'max:255'
                ],
                'uuid' => 'required|exists:articles,uuid',
                'category_id' => 'required|integer|exists:categories,id',
                'excerpt' => 'required|string|min:10|max:255',
                'body' => 'required|string',
                'tags' => 'nullable|string|max:255',
                'thumbnail_image' => 'nullable|image|file|max:400|dimensions:max_width=1280,max_height=720',
                'thumbnail_credit' => 'nullable|string|min:10',
            ];
        }
    }
}
