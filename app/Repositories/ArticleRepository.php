<?php

namespace App\Repositories;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ArticleRepository
{
    public function storeArticle(array $data): int
    {
        $article = new Article();
        $article->uuid = Str::uuid();
        $article->category_id = $data['category_id'];
        $article->user_id = $data['user_id'];
        $article->title = $data['title'];
        $article->slug = Str::slug($data['title']);
        $article->excerpt = $data['excerpt'];
        $article->body = $data['body'];
        $article->tags = $data['tags'];
        $article->thumbnail_credit = $data['thumbnail_credit'];
        $article->published_at = Carbon::now();
        $article->save();

        return $article->id;
    }

    public function getArticles(): Builder
    {
        return Article::with([
            'user.profile',
            'category',
        ])
            ->latest();
    }

    /**
     * Search articles using given keywords
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function searchArticles(string $keywords): Builder
    {
        return Article::latest()->with(['user.profile', 'category'])
            ->where('title', 'like', '%'.$keywords.'%')
            ->orWhere('body', 'like', '%'.$keywords.'%')
            ->orWhere('tags', 'like', '%'.$keywords.'%')
            ->orWhere('excerpt', 'like', '%'.$keywords.'%');
    }

    /**
     * Method for finding article based on given
     * parameter.
     *
     * @param  string  $query: uuid | slug
     */
    public function getArticle(string $query): Article
    {
        if (Str::isUuid($query)) {
            return Article::with(['user', 'category'])->where('uuid', $query)->first();
        }

        return Article::with(['user', 'category'])->where('slug', $query)->first();
    }

    public function updateArticle(array $data): int
    {
        $article = Article::where('uuid', $data['uuid'])->first();

        // Update status only
        if (isset($data['published'])) {
            if ($article->is_published && $data['published'] == 0) {
                $article->published_at = null;
                $article->save();

                return $article->id;
            } elseif (! $article->is_published && $data['published'] == 1) {
                $article->published_at = Carbon::now();
                $article->save();

                return $article->id;
            }
        }

        // Update all attribute
        $article->category_id = $data['category_id'];
        $article->title = $data['title'];
        $article->slug = Str::slug($data['title']);
        $article->excerpt = $data['excerpt'];
        $article->body = $data['body'];
        $article->tags = $data['tags'];
        $article->thumbnail_credit = $data['thumbnail_credit'];
        $article->published_at = Carbon::now();
        $article->save();

        return $article->id;
    }

    public function deleteArticle(string $uuid): string
    {
        $article = Article::where('uuid', $uuid)->first();
        $image_path = $article->thumbnail_image;
        $article->delete();

        return $image_path;
    }
}
