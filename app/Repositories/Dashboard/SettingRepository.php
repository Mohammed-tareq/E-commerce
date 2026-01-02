<?php

namespace App\Repositories\Dashboard;

use App\Models\Setting;

class SettingRepository
{
    public function getSetting()
    {
        return Setting::first();
    }

    public function updateSetting($data)
    {
        return Setting::first()->update($data);
    }

}