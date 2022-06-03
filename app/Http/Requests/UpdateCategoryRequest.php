<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        return [
            'id' => 'required|exists:categories,id',
            'name' => [
                'required',
                Rule::unique('categories')->ignore($request->id),
                'min:3',
                'max:255'
            ],
            'description' => 'required'
        ];
    }
}
