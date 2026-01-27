<?php

namespace App\Services\Dashboard\Dashboard;

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
        $governorate = $this->worldRepository->getGovernorateById($id) ?? false;

        return $governorate;
    }

    public function getCounties()
    {
        return $this->worldRepository->getCounties();
    }

    public function getCountriesWithEagerLoad()
    {
        $countries = $this->worldRepository->getCountriesWithEagerLoad();
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

    public function getGovernorateByCountryId($id)
    {
        return $this->worldRepository->getGovernorateByCountryId($id) ?? abort(404);
    }

    public function getCityByGovernorate($id)
    {
        $governorate = self::getGovernorateById($id);

        if ($governorate) {
            $cities = $this->worldRepository->getCityByGovernorate($governorate) ?? false;
            return $cities;
        }
        return abort(404);

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
        $shippingPrice = $this->worldRepository->changeShippingPrice($governorate, $date['price']);
        return $shippingPrice;

    }

}