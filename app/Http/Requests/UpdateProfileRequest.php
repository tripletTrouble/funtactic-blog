<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|file|image|max:400|dimensions:max_width:520,max_height:520',
            'born' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'interest' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
            'twitter' => 'nullable|active_url',
            'instagram' => 'nullable|active_url',
            'facebook' => 'nullable|active_url',
            'tiktok' => 'nullable|active_url',
            'youtube' => 'nullable|active_url',
            'linkedin' => 'nullable|active_url',
            'github' => 'nullable|active_url',
        ];
    }
}
