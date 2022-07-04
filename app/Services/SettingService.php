<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\SettingRepository;
use App\Interfaces\SettingServiceInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
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

    public function hasMenu(): bool
    {
        $result = false;
        foreach ($this->menus as $menu){
            if ($menu->value != null){
                $result = true;
            }
        }
        return $result;
    }

    public function update(Request $request): void
    {   
        try {
            $this->settingRepository->updateSettings($request->except(['_token', '_method', 'site_logo']));
            $request->hasFile('site_logo') ? $this->fileService->updateSiteLogo($request) : null;
        }catch (Throwable $e){
            report($e);
        }
    }

    public function menus()
    {
        if ($this->hasMenu()){
            $result = (object) [];
            foreach($this->menus as $key => $menu){
                if ($menu->value != null){
                    $result->{$key} = (object) [
                        'id' => $menu->value,
                        'name' => Category::find($menu->value)->name,
                        'link' => url('articles/categories/' . Category::find($menu->value)->slug),
                    ];
                }
            }
            return collect($result);
        }else {
            return (object) [];
        }
    }

    public function resetMenus(): void
    {
        try {
            $this->settingRepository->resetMenus();
        }catch (Throwable $e) {
            report($e);
        }
    }

    public function identities(): array
    {
        return [
            'site_name' => $this->identities[0]->value,
            'site_logo' => ($this->identities[1]->value != null) ? asset('storage/' . $this->identities[1]->value) : null,
            'site_description' => $this->identities[2]->value,
        ];
    }
}
