<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Article;
use App\Interfaces\ArticleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{
  function getArticles(): Collection
  {
    return Article::with(['category'])->get();
  }

  function getArticleById($id): Article
  {
    return Article::with(['category'])->where('id', $id)->first();
  }

  function storeArticle($user_id, $data): bool
  {
    $article = new Article();
    $article->user_id = $user_id;
    $article->category_id = $data['category_id'];
    $article->title = $data['title'];
    $article->thumbnail_url = $data['thumbnail_url'];
    $article->thumbnail_source = $data['thumbnail_source'];
    $article->body = $data['body'];
    $article->tags = $data['tags'];
    $article->published_at = Carbon::now();
    $article->save();
    return true;
  }

  function updateArticle($data): bool
  {
    $article = Article::find($data['id']);
    $article->title = $data['title'];
    $article->category_id = $data['category_id'];
    $article->thumbnail_url = $data['thumbnail_url'];
    $article->thumbnail_source = $data['thumbnail_source'];
    $article->body = $data['body'];
    $article->tags = $data['tags'];
    $article->save();
    return true;
  }

  function deleteArticle($id): bool
  {
    Article::destroy($id);
    return true;
  }
}
