<?php

namespace App\Http\Controllers\Dashboard\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Slider\SliderRequest;
use App\Services\Dashboard\Dashboard\SliderService;

class SliderController extends Controller
{
    public function __construct(
        protected SliderService $sliderService
    )
    {
    }

    public function index()
    {
        return view('dashboard.slider.index');
    }

    public function getSliders()
    {
        return $this->sliderService->getSliderDataTable();
    }

    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        if (!$this->sliderService->storeSlider($data)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ]);
    }

    public function delete($id)
    {
        if (!$this->sliderService->deleteSlider($id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ]);

    }
}
