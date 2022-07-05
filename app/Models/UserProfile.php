<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $appends = ['full_name', 'profile_photo_url'];

    /**
     * Method for getting user's full name
     *
     * @return string
     */
    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name.' '.$this->last_name,
        );
    }

    /**
     * Method for getting user's photo profile valid url
     *
     * @return string
     */
    protected function profilePhotoUrl(): Attribute
    {
        return new Attribute(
            get: fn () => ($this->profile_photo != null) ? asset('storage/'.$this->profile_photo) : null,
        );
    }
}
