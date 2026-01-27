<?php

namespace App\Services\Dashboard\Dashboard;

use App\Repositories\Dashboard\BrandRepository;
use App\Utils\ImageManagement;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

class BrandService
{
    public function __construct(protected BrandRepository $brandRepository ,protected ImageManagement $imageManagement)
    {

    }

    public function getBrandsList()
    {
        return $this->brandRepository->getBrands();
    }

    public function getBrands()
    {
        $brands =  $this->brandRepository->getBrands();

        return DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('name' , function ($brand) {
                return $brand->getTranslation('name', app()->getLocale());
            })
            ->addColumn('image' , function ($brand) {
                return view('dashboard.brand.data-table.image' , compact('brand'));
            })
            // ->addColumn('products_count' , function ($brand) {
            //     return $brand->products_count == 0 ? __('dashboard.not_found') : $brand->products_count;
            // })
            ->addColumn('action' , function ($brand) {
                return view('dashboard.brand.data-table.action' , compact('brand'));
            })
            ->rawColumns(['image' , 'action'])
           ->make(true);
    }

    public function getBrand($id)
    {
        $brand = $this->brandRepository->getBrand($id);
        if (!$brand) {
            abort(404);
        }
        return $brand;
    }

    public function storeBrand($data)
    {
        if(!empty($data['image']))
        {
            $data['image'] = $this->imageManagement->uploadSingleImage('/',$data['image'],'brands');
        }
        return $this->brandRepository->storeBrand($data);
    }

    public function updateBrand($data , $id)
    {
        $brand = $this->getBrand($id);
        if(!empty($data['image']))
        {
            $this->imageManagement->deleteImageFromLocal($brand->image);
            $data['image'] = $this->imageManagement->uploadSingleImage('/',$data['image'],'brands');
        }
        return $this->brandRepository->updateBrand($data , $brand);
    }

    public function deleteBrand($id)
    {
        $brand = $this->getBrand($id);
        if(!empty($brand->image))
        {
            $this->imageManagement->deleteImageFromLocal($brand->image);
        }
        self::updateCache();
        return $this->brandRepository->deleteBrand($brand);
    }
    public function changeStatus($id)
    {
        $brand = $this->getBrand($id);
        return $this->brandRepository->changeStatus($brand);
    }

    private function updateCache()
    {
        Cache::forget('brands_count');
    }
}
