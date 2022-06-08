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
        if ($this->has('site_name')){
            return [
                'site_name' => 'required|string|max:255',
                'site_description' => 'required|string|max:255'
            ];
        }
    }
}
