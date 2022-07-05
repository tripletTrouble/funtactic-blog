<?php

namespace App\Interfaces;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleServiceInterface
{
    public function store(Request $request): void;

    public function get(int $perPage): LengthAwarePaginator;

    public function published(int $perPage): LengthAwarePaginator;

    public function find(string $query): Article;

    public function search(string $keywords): LengthAwarePaginator;

    public function update(Request $request): void;

    public function delete(string $uuid): void;
}
