<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
  function getCategories(): Collection;
  function getCategoryById($id): Category;
  function storeCategory($data): bool;
  function updateCategory($data): bool;
  function deleteCategory($id): bool;
}
