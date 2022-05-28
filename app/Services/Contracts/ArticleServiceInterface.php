<?php

namespace App\Services\Contracts;

interface ArticleServiceInterface
{
  function storeArticle($user_id, $article): bool;
}
