<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.categories', [
            'title' => 'Daftar Kategori',
            'categories' => $this->categoryRepository->getCategories()
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
        $this->categoryRepository->storeCategory($request->except(['_token']));
        return redirect()->to(url('/categories'))->with('success', 'Kategori telah dibuat!');
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
    public function update(UpdateCategoryRequest $request)
    {
        $this->categoryRepository->updateCategory($request->except(['_token']));
        return redirect()->to(url('/categories'))->with('success', 'Kategori telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\DeleteCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCategoryRequest $request)
    {
        $this->categoryRepository->deleteCategory($request->id);
        return redirect()->to(url('/categories'))->with('success', 'Kategori telah dihapus!');
    }
}
