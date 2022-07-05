<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'site_name' => 'nullable|string|max:255',
            'site_logo' => 'nullable|file|image|dimensions:max_width=520,max_height=520|max:400',
            'site_description' => 'nullable|string|max:255',
            'menu_1' => 'nullable|integer|exists:categories,id',
            'menu_2' => 'nullable|integer|exists:categories,id',
            'menu_3' => 'nullable|integer|exists:categories,id',
        ];
    }
}
