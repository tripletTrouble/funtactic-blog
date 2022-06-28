<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\SettingRepository;
use App\Interfaces\SettingServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Throwable;

class SettingService implements SettingServiceInterface
{
    protected SettingRepository $settingRepository;
    protected FileService $fileService;
    protected Collection $identities;
    protected Collection $menus;

    public function __construct()
    {
        $this->settingRepository = new SettingRepository;
        $this->fileService = new FileService;
        $this->identities = $this->settingRepository->getIndentities();
        $this->menus = $this->settingRepository->getMenus();
    }

    public function update(Request $request): void
    {
        // Check what kind of update, identities or menus
        if ($request->has(['site_name', 'site_description'])){
            try {
                $this->settingRepository->updateIdentities($request->except(['_token', '_method']));
                $this->fileService->updateSiteLogo($request);
            }catch (Throwable $e) {
                report($e);
            }
        }else if ($request->has('menu_1')){
            try {
                $this->settingRepository->updateMenus($request->except(['_token', '_method']));
            }catch (Throwable $e) {
                report($e);
            }
        }
    }

    public function menus(): array
    {
        return [
          'menu_1' => $this->menus[0]->value,
          'menu_2' => $this->menus[1]->value,
          'menu_3' => $this->menus[2]->value,
          'menu_4' => $this->menus[3]->value,
        ];
    }

    public function identities(): array
    {
        return [
            'site_name' => $this->identities[0]->value,
            'site_logo' => ($this->identities[1]->value != null) ? asset('storage/'. $this->identities[1]->value) : null,
            'site_description' => $this->identities[2]->value,
        ];
    }
}
