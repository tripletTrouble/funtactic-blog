<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class FileService
{
    public function saveOrUpdateArticleImage(Request $request, int $article_id): void
    {
        $article = Article::find($article_id);

        if ($article->thumbnail_image && $request->hasFile('thumbnail_image')) {
            Storage::delete($article->thumbnail_image);
            $article->thumbnail_image = $request->file('thumbnail_image')->store('thumbnail-images');
            $article->save();
        } else if ($request->hasFile('thumbnail_image')) {
            $article->thumbnail_image = $request->file('thumbnail_image')->store('thumbnail-images');
            $article->save();
        }
    }

    public function deleteArticleImage(string $path): void
    {
        Storage::delete($path);
    }
}
