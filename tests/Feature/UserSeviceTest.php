<?php

namespace Tests\Feature;

use App\Interfaces\UserServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UserSeviceTest extends TestCase
{
    private UserServiceInterface $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserServiceInterface::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        dd($this->userService->getOwnerInfo(['full_name']));
    }
}
