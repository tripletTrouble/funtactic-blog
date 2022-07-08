<?php

namespace App\Models;

use Carbon\Carbon;
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
     * @return Attribute
     */
    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name.' '.$this->last_name,
        );
    }

    /**
     * Modify born column into Carbon Object
     * 
     * @return Attribute
     */
    protected function born(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
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
