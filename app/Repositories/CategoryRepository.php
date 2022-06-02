<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
  function getCategories(): Collection
  {
    return Category::all();
  }

  function getCategoryById($id): Category
  {
    return Category::with(['articles'])->where('id', $id)->first();
  }

  function storeCategory($data): bool
  {
    Category::create([
      'name' => $data['name'],
      'description' => $data['description'],
    ]);
    return true;
  }

  function updateCategory($data): bool
  {
    Category::where('id', $data['id'])->update([
      'name' => $data['name'],
      'description' => $data['description'],
    ]);
    return true;
  }

  function deleteCategory($id): bool
  {
    Category::destroy($id);
    return true;
  }
}
