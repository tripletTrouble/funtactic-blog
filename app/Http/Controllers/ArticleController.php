<?php

namespace App\Http\Controllers;

use App\Facades\Articles;
use App\Facades\Categories;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.articles', [
            'title' => 'Daftar Artikel',
            'articles' => Articles::get(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.create-article', [
            'title' => 'Buat artikel baru',
            'categories' => Categories::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        Articles::store($request->merge(['user_id' => Auth::id() ?? 1]));
        return back()->with('success', 'Artikel telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  sting  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show(string $uuid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Requests\EditArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function edit(string $uuid)
    {
        return view('admin-panel.edit-article', [
            'title' => 'Sunting Artikel',
            'article' => Articles::find($uuid),
            'categories' => Categories::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, string $uuid)
    {
        Articles::update($request->merge(['uuid' => $uuid]));
        return back()->with('success', 'Artikel telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\DeleteArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $uuid)
    {
        Articles::delete($uuid);
        return back()->with('success', 'Artikel telah dihapus!');
    }
}
