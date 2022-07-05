<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryRepository
{
    public function storeCategory(Request $request): void
    {
        $category = new Category();
        $category->uuid = Str::uuid();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();
    }

    public function getCategories(): Builder
    {
        return Category::oldest();
    }

    /**
     * Method for finding category based on given
     * parameter.
     *
     * @param  string  $query: uuid | slug
     */
    public function getCategory(string $query): Category
    {
        if (Str::isUuid($query)) {
            return Category::where('uuid', $query)->first();
        }

        return Category::where('slug', $query)->first();
    }

    public function updateCategory(Request $request): void
    {
        $category = Category::where('uuid', $request->uuid)->first();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();
    }

    public function deleteCategory(string $uuid): void
    {
        $category = Category::with(['articles'])->where('uuid', $uuid)->first();

        // Prevent to delete Uncategorized
        if ($category->id !== 1) {
            // Set all articles to Uncategorized
            foreach ($category->articles as $article) {
                $article->category_id = 1;
                $article->save();
            }

            // Then delete the category
            $category->delete();
        }
    }
}
