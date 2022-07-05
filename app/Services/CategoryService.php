<?php

namespace App\Services;

use App\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Throwable;

class CategoryService implements CategoryServiceInterface
{
    protected CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function store(Request $request): void
    {
        try {
            $this->categoryRepository->storeCategory($request);
        } catch (Throwable $e) {
            report($e);
        }
    }

    public function get(int $perPage = 0): mixed
    {
        if ($perPage === 0) {
            return $this->categoryRepository->getCategories()->get();
        } else {
            return $this->categoryRepository->getCategories()->paginate($perPage);
        }
    }

    public function find(string $query): Category
    {
        return $this->categoryRepository->getCategory($query);
    }

    public function update(Request $request): void
    {
        try {
            $this->categoryRepository->updateCategory($request);
        } catch (Throwable $e) {
            report($e);
        }
    }

    public function delete(string $uuid): void
    {
        try {
            $this->categoryRepository->deleteCategory($uuid);
        } catch (Throwable $e) {
            report($e);
        }
    }
}
