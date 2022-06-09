<?php

namespace Tests\Feature;

use App\Interfaces\SettingRespositoryInterface;
use App\Repositories\SettingRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UpdateMenuTest extends TestCase
{
    private SettingRespositoryInterface $settingRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->settingRepository = $this->app->make(SettingRepository::class);
    }
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        dd($this->settingRepository->updateSetting(collect([
            'menu_1' => 1,
            'menu_2' => 2,
            'menu_3' => 3,
            'menu_4' => 1,
        ])));
    }
}
