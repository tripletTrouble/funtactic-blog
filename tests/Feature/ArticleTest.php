<?php

namespace Tests\Feature;

use App\Services\ArticleService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    private ArticleService $articleService;
    

    protected function setUp(): void
    {
        parent::setUp();
        $this->articleService = $this->app->make(ArticleService::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        self::assertTrue($this->articleService->storeArticle(1, [
            'category_id' => 1,
            'title' => 'Lorem Ipsum',
            'thumbnail_url' => 'https://www.example.com',
            'thumbnail_source' => 'User Documentation',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing el',
        ]));
    }
}
