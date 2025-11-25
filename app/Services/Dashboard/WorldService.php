<?php

namespace App\Services\Dashboard;

use App\Models\Governorate;
use App\Repositories\Dashboard\WorldRepository;

class WorldService
{
    public function __construct(
        protected WorldRepository $worldRepository
    )
    {
    }


    public function getCountryById($id)
    {
        $country = $this->worldRepository->getCountryById($id);
        if (!$country) {
            abort(404);
        }
        return $country;
    }

    public function getGovernorateById($id)
    {
        $governorate = $this->worldRepository->getGovernorateById($id);
        if (!$governorate) {
            abort(404);
        }
        return $governorate;
    }

    public function getCountries()
    {
        $countries = $this->worldRepository->getCountries();
        if (!$countries) {
            abort(404);
        }
        return $countries;
    }

    public function getGovernorateByCountry($id)
    {
        $country = self::getCountryById($id);
        $governorates = $this->worldRepository->getGovernorateByCountry($country);
        if (!$governorates) {
            abort(404);
        }
        return $governorates;
    }

    public function getCityByGovernorate($id)
    {
        $governorate = self::getGovernorateById($id);
        $cities = $this->worldRepository->getCityByGovernorate($governorate);
        if (!$cities) {
            abort(404);
        }
        return $cities;
    }

    public function changeStatusForCountry($id)
    {
        $country = self::getCountryById($id);
        $country = $this->worldRepository->changeStatusForCountry($country);
        if (!$country) {
            abort(404);
        }
        return $country;
    }

    public function changeStatusForGovernorate($id)
    {
        $governorate = self::getGovernorateById($id);
        $governorate = $this->worldRepository->changeStatusForGovernorate($governorate);
        if (!$governorate) {
            abort(404);
        }
        return $governorate;
    }


    public function changeShippingPrice($date)
    {
        $governorate = self::getGovernorateById($date['governorate_id']);
        $shippingPrice = $this->worldRepository->changeShippingPrice($governorate,$date['price']);
        return $shippingPrice;

    }

}