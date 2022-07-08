<?php

namespace App\Services;

use Throwable;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\ArticleServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService implements ArticleServiceInterface
{
    protected ArticleRepository $articleRepository;

    protected FileService $fileService;

    protected Builder $articles;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->fileService = new FileService();
        $this->articles = $this->articleRepository->getArticles();
    }

    public function store(Request $request): void
    {
        $data = $request->except(['_token']);
        try {
            $article_id = $this->articleRepository->storeArticle($data);
            $this->fileService->saveOrUpdateArticleImage($request, $article_id);
        } catch (throwable $e) {
            report($e);
        }
    }

    public function get(): Collection
    {
        return $this->articles->get();
    }

    public function paginate(int $perPage): LengthAwarePaginator
    {
        return $this->articles->paginate($perPage);
    }

    public function published()
    {
        $this->articles = $this->articles->where('published_at', '<>', null);
        return $this;
    }

    public function unpublished()
    {
        $this->articles = $this->articles->where('published_at', null);
        return $this;
    }

    public function find(string $query): Article
    {
        return $this->articleRepository->getArticle($query);
    }

    public function search(string $keywords, int $perPage = 0): LengthAwarePaginator
    {
        return $this->articleRepository->searchArticles($keywords)->paginate($perPage);
    }

    public function update(Request $request): void
    {
        $data = $request->except(['_token', '_method']);
        try {
            $article_id = $this->articleRepository->updateArticle($data);
            $this->fileService->saveOrUpdateArticleImage($request, $article_id);
        } catch (Throwable $e) {
            report($e);
        }
    }

    public function delete(string $uuid): void
    {
        try {
            $image_path = $this->articleRepository->deleteArticle($uuid);
            $this->fileService->deleteArticleImage($image_path);
        } catch (Throwable $e) {
            report($e);
        }
    }
}
