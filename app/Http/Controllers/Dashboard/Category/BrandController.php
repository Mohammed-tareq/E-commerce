<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Brand\BrandRequest;
use App\Services\Dashboard\BrandService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Arr;

class BrandController extends Controller implements HasMiddleware
{
   public function __construct(public BrandService $brandService){}

    public static function middleware()
    {
        return ['can:brands'];
    }
    public function index()
    {
        return view('dashboard.brand.index');
    }

    public function getBrands()
    {
        return $this->brandService->getBrands();
    }
    public function create()
    {
        return view('dashboard.brand.create');
    }


    public function store(BrandRequest $request)
    {
        $data = Arr::only($request->validated(), ['name' , 'status' , 'image']);

        if(!$this->brandService->storeBrand($data)){
            return redirect()->back()->with('error', __('dashboard.operation_failed'));
        }
        return redirect()->route('dashboard.brands.index')->with('success', __('dashboard.operation_success'));

    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $brand  = $this->brandService->getBrand($id);
        return view('dashboard.brand.edit' , compact('brand'));
    }


    public function update(BrandRequest $request, string $id)
    {
        $data = Arr::only($request->validated(), ['name' , 'status' , 'image']);
        if(!$this->brandService->updateBrand($data , $id)){
            return redirect()->back()->with('error', __('dashboard.operation_failed'));
        }
        return redirect()->route('dashboard.brands.index')->with('success', __('dashboard.operation_success'));

    }


    public function destroy(string $id)
    {
        if(!$this->brandService->deleteBrand($id))
        {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return redirect()->back()->with('success', __('dashboard.operation_success'));

    }
    public function changeStatus($id)
    {
        $status = $this->brandService->changeStatus($id);
        if(!$status){
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 400);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ], 200);
    }
}
