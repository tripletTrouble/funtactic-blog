<?php

namespace App\Models;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'uuid', 'created_at', 'updated_at', 'published_at'];

    protected $hidden = ['id'];

    protected $appends = ['is_published', 'thumbnail_url', 'creation_date', 'parsed_body'];

    /**
     * Method for getting article published status
     *
     * @return Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function isPublished(): Attribute
    {
        return new Attribute(
            get: fn () => $this->published_at === null ? false : true
        );
    }

    /**
     * Method for getting article's thumbnail
     * valid url.
     *
     * @return Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function thumbnailUrl(): Attribute
    {
        return new Attribute(
            get: fn () => asset('storage/'.$this->thumbnail_image)
        );
    }

    /**
     * Get the created local date
     *
     * @return Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function creationDate(): Attribute
    {
        return new Attribute(
            get: fn () => $this->created_at->isoFormat('D MMMM Y')
        );
    }

    /**
     * Get the parsed body
     *
     * @return Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function parsedBody(): Attribute
    {
        return new Attribute(
            get: fn () => Markdown::convert($this->body)->getContent()
        );
    }

    /**
     * Get the category that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
