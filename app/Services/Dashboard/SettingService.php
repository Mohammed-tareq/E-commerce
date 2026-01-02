<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\SettingRepository;

class SettingService
{

    public function __construct(protected SettingRepository $settingRepository)
    {
    }

    public function getSetting()
    {
        return $this->settingRepository->getSetting()?? abort(404);
    }

    public function updateSetting($data)
    {
        return $this->settingRepository->updateSetting($data);
    }

}