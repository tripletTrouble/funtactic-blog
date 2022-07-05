<?php

namespace Tests\Feature;

use App\Interfaces\UserServiceInterface;
use Tests\TestCase;

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
