<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function store(Request $request): void;

    public function get(int $perPage): mixed;

    public function find(string $query): Category;

    public function update(Request $request): void;

    public function delete(string $uuid): void;
}
