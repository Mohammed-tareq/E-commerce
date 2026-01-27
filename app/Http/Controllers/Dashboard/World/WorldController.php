<?php

namespace App\Http\Controllers\Dashboard\World;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\World\PriceRequest;
use App\Services\Dashboard\Dashboard\WorldService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WorldController extends Controller implements HasMiddleware
{

    public function __construct(
        protected WorldService $worldService
    )
    {
    }

    public static function middleware(): array
    {
        return [
            new Middleware('can:shipping')
        ];
    }


    public function getCountries()
    {

        $countries = $this->worldService->getCountriesWithEagerLoad();
        if (!$countries) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return view('dashboard.world.countries', compact('countries'))->with('success', __('dashboard.operation_success'));
    }

    public function getGovernorateByCountry($id)
    {
        $governorates = $this->worldService->getGovernorateByCountry($id);
        if (!$governorates) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return view('dashboard.world.governorates', compact('governorates'))->with('success', __('dashboard.operation_success'));
    }

    public function getCityByGovernorate($id)
    {
        $cities = $this->worldService->getCityByGovernorate($id);
        if (!$cities) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return view('dashboard.world.cities', compact('cities'))->with('success', __('dashboard.operation_success'));
    }


    public function changeShippingPrice(PriceRequest $request)
    {
        $data = $request->validated();
        if (!$this->worldService->changeShippingPrice($data)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 401);
        }
        $governorate = $this->worldService->getGovernorateById($data['governorate_id']);
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success'),
            'data' => $governorate->shippingPrices
        ], 200);
    }

    public function changeStatusForCountry($id)
    {
        $status = $this->worldService->changeStatusForCountry($id);
        if (!$status) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 401);
        }

        $country = $this->worldService->getCountryById($id);
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success'),
            'country' => $country
        ], 200);
    }

    public function changeStatusForGovernorate($id)
    {
        $status = $this->worldService->changeStatusForGovernorate($id);
        if (!$status) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 401);
        }
        $governorate = $this->worldService->getGovernorateById($id);
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success'),
            'governorate' => $governorate
        ], 200);
    }
}
