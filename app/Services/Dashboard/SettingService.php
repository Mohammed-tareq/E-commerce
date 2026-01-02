<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\SettingRepository;
use App\Utils\ImageManagement;

class SettingService
{

    public function __construct(protected SettingRepository $settingRepository,
                                protected ImageManagement $imageManagement)
    {
    }

    public function getSetting()
    {
        return $this->settingRepository->getSetting()?? abort(404);
    }

    public function updateSetting($data)
    {
        if(!empty($data['logo'])){
            $this->imageManagement->deleteImageFromLocal($data['logo']);
            $data['logo'] = $this->imageManagement->uploadSingleImage('/',$data['logo'],'settings');
        }

        if(!empty($data['favicon'])){
            $this->imageManagement->deleteImageFromLocal($data['favicon']);
            $data['favicon'] = $this->imageManagement->uploadSingleImage('/',$data['favicon'],'settings');
        }

        return $this->settingRepository->updateSetting($data);
    }

}