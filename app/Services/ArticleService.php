<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Article;
use App\Services\Contracts\ArticleServiceInterface;

class ArticleService implements ArticleServiceInterface
{
  public function storeArticle($user_id, $data): bool
  {
    $article = new Article();
    $article->user_id = $user_id;
    $article->category_id = $data['category_id'];
    $article->title = $data['title'];
    $article->thumbnail_url = $data['thumbnail_url'];
    $article->thumbnail_source = $data['thumbnail_source'];
    $article->body = $data['body'];
    $article->published_at = Carbon::now();

    if ($article->save()) {
      return true;
    } else {
      return false;
    }
  }
}
