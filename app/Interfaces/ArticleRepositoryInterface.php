<?php

namespace App\Interfaces;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
  function getArticles(): Collection;
  function getArticleById($id): Article;
  function storeArticle($user_id, $data): bool;
  function updateArticle($data): bool;
  function deleteArticle($id): bool;
}
