<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        }elseif ($this->has('menu_1')){
            return [
                'menu_1' => [
                    'integer',
                    Rule::unique('settings', 'value')->ignore(3)
                ],
                'menu_2' => [
                    'integer',
                    Rule::unique('settings', 'value')->ignore(4)
                ],
                'menu_3' => [
                    'integer',
                    Rule::unique('settings', 'value')->ignore(5)
                ],
                'menu_4' => [
                    'integer',
                    Rule::unique('settings', 'value')->ignore(6)
                ],
            ];
        }
    }
}
