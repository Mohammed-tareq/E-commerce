<?php

namespace App\Services\Api\Address;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;

class AddressService
{
    public function getCountries($scope = false)
    {
        $countries = Country::when($scope, function ($query) {
            $query->active();
        })->get();
        return $countries;
    }

    public function getGovernorates(Country $country, $scope = false)
    {
        $governorates = $country->governorates()->when($scope, function ($query) {
            $query->active();
        })->get();
        return $governorates;
    }

    public function getCities(Governorate $governorate, $scope = false)
    {
        $cities = $governorate->cities()->when($scope, function ($query) {
            $query->active();
        })->get();
        return $cities;
    }

}