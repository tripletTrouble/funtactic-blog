<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryServiceInterface
{
    public function store (Request $request): void;
    public function get ($perPage): LengthAwarePaginator;
    public function find(string $query): Category;
    public function update(Request $request): void;
    public function delete(string $uuid): void;
}
