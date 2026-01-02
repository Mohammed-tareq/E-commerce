<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


    public function boot(): void
    {
        $setting = $this->getSetting();
        view()->share('setting', $setting);
    }

    private function getSetting()
    {
        return Setting::firstOr(function () {
            Setting::create([
                "site_name" => [
                    'ar' => 'اسم الموقع',
                    'en' => 'Site Name',
                ],
                "site_desc" => [
                    'ar' => 'وصف الموقع',
                    'en' => 'Site Description',
                ],
                "meta_desc" => [
                    'ar' => 'وصف الموقع للبحث',
                    'en' => 'Site Description for Search',
                ],
                "site_copy_right" => [
                    'ar' => 'حقوق الموقع',
                    'en' => 'Site Copyright',
                ],
                "logo" => 'logo.png',
                "favicon" => 'favicon.png',
                "site_email" => 'info@example.com',
                "site_phone" => '+123456789',
                "email_support" => 'support@example.com',
                "facebook" => 'https://www.facebook.com/example',
                "instagram" => 'https://www.instagram.com/example',
                "linkedin" => 'https://www.linkedin.com/company/example',
                "promotion_video_url" => 'https://www.youtube.com/watch?v=example',
            ]);
        });
    }
}
