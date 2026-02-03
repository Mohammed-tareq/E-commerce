<?php

namespace App\Livewire\Website\CheckOut;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\ShippingPrice;
use Livewire\Component;

class ShippingDetails extends Component
{
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $countryId = null, $governorateId = null, $cityId = null;

    public $countries = [], $governorates = [], $cities = [];


    public function SendDataUser()
    {
        $user = auth('web')->user();
        $this->fname = $user->first_name ?? '';
        $this->lname = $user->last_name ?? '';
        $this->email = $user->email ?? '';
        $this->phone = $user->phone ?? '';

    }

    public function updatedCityId()
    {
        $priceShipping = ShippingPrice::where('governorate_id', $this->governorateId)->first()->price;
        $this->dispatch('shipping-price', $priceShipping);
    }

    public function render()
    {
        $this->countries = Country::active()->get();
        $this->governorates = $this->countryId ? Governorate::active()->where('country_id', $this->countryId)->get() : [];
        $this->cities = $this->governorateId ? City::where('governorate_id', $this->governorateId)->get() : [];
        return view('livewire.website.check-out.shipping-details', [
            'countries' => $this->countries,
            'governorates' => $this->governorates,
            'cities' => $this->cities,
        ]);
    }
}
