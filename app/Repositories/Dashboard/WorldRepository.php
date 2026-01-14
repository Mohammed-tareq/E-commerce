<?php

namespace App\Repositories\Dashboard;

use App\Models\Country;
use App\Models\Governorate;

class WorldRepository
{

    public function getCountryById($id)
    {

        return Country::find($id);
    }

    public function getGovernorateById($id)
    {

        return Governorate::find($id);
    }

    public function getGovernorateByCountryId($id)
    {
        return Governorate::where('country_id',$id)->get();
    }

    public function getCounties()
    {
        return Country::all();
    }

    public function getCountriesWithEagerLoad()
    {
        return Country::with(['users','governorates'])->withCount(['users','governorates'])->when(!empty(request()->search), function ($query) {
            $query->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);
    }

    public function getGovernorateByCountry($country)
    {

        return $country->governorates()->with(['users','cities','shippingPrices','country'])->withCount(['users','cities'])->when(!empty(request()->search), function ($query) {
            $query->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);
    }

    public function getCityByGovernorate($governorate)
    {
        return $governorate->cities;
    }

    public function changeStatusForCountry($country)
    {
        $country->update([
            'status' => !$country->getRawOriginal('status')
        ]);
        return $country;
    }

    public function changeStatusForGovernorate($governorate)
    {
        $governorate->update([
            'status' => !$governorate->getRawOriginal('status')
        ]);
        return $governorate;
    }

    public function changeShippingPrice($governorate, $price)
    {
        $governorate->shippingPrices->update([
            'price' => $price
        ]);

        return $governorate;
    }
}