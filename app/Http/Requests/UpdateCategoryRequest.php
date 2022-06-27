<?php

namespace App\Http\Requests;

use App\Facades\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id' => Categories::find($this->route('uuid'))->id
        ]);
    }

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
                Rule::unique('categories')->ignore($this->id),
                'min:3',
                'max:255'
            ],
            'description' => 'required|string'
        ];
    }
}
