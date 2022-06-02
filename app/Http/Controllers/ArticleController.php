<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\DeleteArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Interfaces\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.articles', [
            'title' => 'Daftar Artikel',
            'articles' => $this->articleRepository->getArticles()
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
            'categories' => Category::all(),
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
        $user_id = Auth::id() ?? 1;
        $this->articleRepository->storeArticle($user_id, $request->except(['_token']));
        return redirect()->back()->with('success', 'Artikel telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Requests\EditArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function edit(EditArticleRequest $request)
    {
        return view('admin-panel.edit-article', [
            'title' => 'Sunting Artikel',
            'article' => $this->articleRepository->getArticleById($request->id),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest $requestt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request)
    {
        $this->articleRepository->updateArticle($request->except(['_token']));
        return redirect()->to(url('/articles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\DeleteArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteArticleRequest $request)
    {
        $this->articleRepository->deleteArticle($request['id']);
        return redirect()->to(url('/articles'));
    }
}
