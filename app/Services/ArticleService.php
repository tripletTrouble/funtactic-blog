<?php

namespace App\Services;

use Throwable;
use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ArticleRepository;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\ArticleServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService implements ArticleServiceInterface
{
    protected ArticleRepository $articleRepository;
    protected FileService $fileService;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->fileService = new FileService();
    }
    
    public function store(Request $request): void
    {
        $data = $request->except(['_token']);
        try {
            $article_id = $this->articleRepository->storeArticle($data);
            $this->fileService->saveOrUpdateArticleImage($request, $article_id);
        } catch (throwable $e){
            report ($e);
        }
    }

    public function get(int $perPage): LengthAwarePaginator
    {
        return $this->articleRepository->getArticles()->paginate($perPage);
    }

    public function published(int $perPage): LengthAwarePaginator
    {
        return $this->articleRepository->getArticles()
                ->where('published_at', '<>', null)
                ->orWhere('published_at', '<=', Carbon::now())
                ->paginate($perPage);
    }

    public function find(string $query): Article
    {
        return $this->articleRepository->getArticle($query);
    }

    public function update(Request $request): void
    {
        $data = $request->except(['_token', '_method']);
        try {
            $article_id = $this->articleRepository->updateArticle($data);
            $this->fileService->saveOrUpdateArticleImage($request, $article_id);
        }catch (Throwable $e){
            report ($e);
        }
    }

    public function delete(string $uuid): void
    {
        try {
            $image_path = $this->articleRepository->deleteArticle($uuid);
            $this->fileService->deleteArticleImage($image_path);
        }catch (Throwable $e) {
            report($e);
        }
    }
}
