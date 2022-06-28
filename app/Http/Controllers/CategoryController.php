<?php

namespace App\Http\Controllers;

use App\Facades\Categories;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.categories', [
            'title' => 'Daftar Kategori',
            'categories' => Categories::get(12)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Categories::store($request);
        return back()->with('success', 'Kategori telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, string $uuid)
    {
        Categories::update($request->merge(['uuid' => $uuid]));
        return redirect()->to(url('/categories'))->with('success', 'Kategori telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\DeleteCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $uuid)
    {
        Categories::delete($uuid);
        return back()->with('success', 'Kategori telah dihapus!');
    }
}
