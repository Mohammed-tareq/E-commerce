<?php

namespace App\Repositories\Dashboard;

use App\Models\Slider;

class SliderRepository
{

    public function getSliders()
    {
        return Slider::all();
    }

    public function getSlider($id)
    {
        return Slider::find($id);
    }

    public function create($data)
    {
        return Slider::create($data);
    }

    public function delete($slider)
    {
        return $slider->delete();
    }
}