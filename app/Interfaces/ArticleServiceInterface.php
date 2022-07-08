<?php

namespace App\Interfaces;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleServiceInterface
{
    public function store(Request $request): void;

    public function get(): Collection;

    public function paginate(int $perPage): LengthAwarePaginator;

    public function published();

    public function unpublished();

    public function find(string $query): Article;

    public function search(string $keywords): LengthAwarePaginator;

    public function update(Request $request): void;

    public function delete(string $uuid): void;
}
