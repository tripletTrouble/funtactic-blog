<?php

namespace App\Http\Controllers;

use App\Facades\Settings;
use App\Facades\Categories;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display site settings form
     * 
     * @return \Illuminate\View\View
     */
    public function siteSettings()
    {
        return view('admin-panel.site-settings', [
            'settings' => Settings::identities()
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
            'categories' => Categories::get(),
            'menus' => Settings::menus()
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
        Settings::update($request);
        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }

    /**
     * Reset the site's menu list
     * 
     * @return \Illuminate\Http\Response
     */
    public function resetMenus()
    {
        Settings::resetMenus();
        return back()->with('success', 'Menu telah direset!');
    }
}
