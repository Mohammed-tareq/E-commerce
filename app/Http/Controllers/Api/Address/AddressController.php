<?php

namespace App\Http\Controllers\Api\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Governorate;
use App\Services\Api\Address\AddressService;
use App\Traits\ApiResponse;

class AddressController extends Controller
{
    use ApiResponse;

    public function __construct(protected AddressService $addressService)
    {
    }

    public function getCountries()
    {
        if (!$data = $this->addressService->getCountries()) {
            return $this->apiresponse('No Data Found', 404);
        }
        return $this->apiresponse('Data Found', 200, $data);
    }

    public function getGovernorates(Country $country)
    {
        if (!$data = $this->addressService->getGovernorates($country)) {
            return $this->apiresponse('No Data Found', 404);
        }
        return $this->apiresponse('Data Found', 200, $data);
    }

    public function getCities(Governorate $governorate)
    {
        if (!$data = $this->addressService->getCities($governorate)) {
            return $this->apiresponse('No Data Found', 404);
        }
        return $this->apiresponse('Data Found', 200, $data);
    }
}
