<?php

namespace App\Services\Dashboard\Dashboard;

use App\Repositories\Dashboard\SliderRepository;
use App\Utils\ImageManagement;
use Yajra\DataTables\DataTables;

class SliderService
{
    public function __construct(
        protected SliderRepository $sliderRepository,
        protected ImageManagement  $imageManagement
    )
    {
    }

    public function getSlider($id)
    {
        return $this->sliderRepository->getSlider($id) ?? false;
    }

    public function getSliders()
    {
        return $this->sliderRepository->getSliders();
    }

    public function getSliderDataTable()
    {
        $sliders = $this->getSliders();

        return DataTables::of($sliders)
            ->addIndexColumn()
            ->addColumn('note', fn($slider) => $slider->getTranslation('note', app()->getLocale()))
            ->addColumn('image', fn($slider) => view('dashboard.slider.data-table.image', compact('slider')))
            ->addColumn('actions', fn($slider) => view('dashboard.slider.data-table.action', compact('slider')))
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }

    public function storeSlider($data)
    {
        if (!array_key_exists('image', $data) && $data['image'] === null) {
            return false;
        }
        $data['image'] = $this->imageManagement->uploadSingleImage('/', $data['image'], 'sliders');
        return $this->sliderRepository->create($data);
    }

    public function deleteSlider($id)
    {
        $slider = $this->getSlider($id);
        if (!$slider) {
            return false;
        }
        if ($slider->image !== null) {
            $this->imageManagement->deleteImageFromLocal($slider->image);
        }
        return $this->sliderRepository->delete($slider);
    }


}