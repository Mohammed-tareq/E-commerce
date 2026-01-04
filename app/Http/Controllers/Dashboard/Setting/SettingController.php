<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Setting\SettingRequest;
use App\Services\Dashboard\SettingService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Arr;

class SettingController extends Controller implements HasMiddleware
{
    public function __construct(protected SettingService $settingService)
    {

    }

    public static function middleware()
    {
        return ['can:settings'];
    }

    public function index()
    {
        return view('dashboard.setting.index');
    }

    public function update(SettingRequest $request)
    {
        $data = Arr::only($request->validated(), ['site_name', 'site_desc', 'meta_desc', 'site_copy_right', 'logo', 'favicon', 'site_email', 'email_support', 'facebook', 'instagram', 'linkedin', 'youtube', 'promotion_video_url']);
        if (!$this->settingService->updateSetting($data)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 500);
        }
        $setting = $this->settingService->getSetting();
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success'),
            'setting' => $setting
        ]);

    }
}
