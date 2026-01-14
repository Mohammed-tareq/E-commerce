<?php

namespace App\Livewire\General;

use App\Services\Dashboard\WorldService;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddressDropDown extends Component
{
    public $countryId, $governorateId, $cityId;
    protected $worldService;

    public function boot(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }

    public function countries()
    {
        return $this->worldService->getCounties();
    }

    public function governorates()
    {
        if ($this->countryId) {
            $govenorates = $this->worldService->getGovernorateByCountryId($this->countryId);
            if (is_a($govenorates, Collection::class)) {
                return $govenorates;
            }
            return [];
        }
        return [];
    }

    public function cities()
    {
        if ($this->governorateId) {
            $cities = $this->worldService->getCityByGovernorate($this->governorateId);
            if (is_a($cities, Collection::class)) {
                return $cities;
            }
            return[];
        }
        return [];
    }

    public function render()
    {

        return view('livewire.general.address-drop-down', [
            'countries' => $this->countries(),
            'governorates' => $this->governorates(),
            'cities' => $this->cities()

        ]);
    }
}
