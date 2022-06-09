<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSettingRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\SettingRespositoryInterface;

class SettingController extends Controller
{
    private SettingRespositoryInterface $settingRespository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(SettingRespositoryInterface $settingRespository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->settingRespository = $settingRespository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display site settings form
     * 
     * @return \Illuminate\View\View
     */
    public function siteSettings()
    {
        return view('admin-panel.site-settings', [
            'settings' => $this->settingRespository->getSettings()->only([1, 2])
        ]);
    }

    /**
     * Display menu settings form
     * 
     * @return \Illuminate\View\View
     */
    public function menuSettings()
    {
        return view('admin-panel.menu-settings', [
            'categories' => $this->categoryRepository->getCategories(),
            'settings' => $this->settingRespository->getSettings()->only([3, 4, 5, 6])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request)
    {
        $this->settingRespository->updateSetting($request->except(['_token', '_method']));
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
