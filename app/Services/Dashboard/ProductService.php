<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\Product\ProductRepository;
use App\Repositories\Dashboard\Product\ProductVariantAttributeRepository;
use App\Repositories\Dashboard\Product\ProductVariantRepository;
use App\Utils\ImageManagement;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductService
{
    public function __construct(protected ProductRepository                 $productRepository,
                                protected ProductVariantRepository          $productVariantRepository,
                                protected ProductVariantAttributeRepository $productVariantAttributeRepository,
                                protected ImageManagement                   $imageManagement)
    {
    }


    public function getproduct($id)
    {
        return $this->productRepository->getProduct($id) ?? abort(404);
    }


    public function getProducts()
    {
        $products = $this->productRepository->getProducts();

        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('name', fn($product) => $product->getTranslation('name', app()->getLocale()))
            ->addColumn('has_variants', fn($product) => $product->hasVariants())
            ->addColumn('price', fn($product) => $product->price())
            ->addColumn('qty', fn($product) => $product->qty())
            ->addColumn('category', fn($product) => $product->category->name)
            ->addColumn('brand', fn($product) => $product->brand->name)
            ->addColumn('action', fn() => view('dashboard.product.data-table.action'))
            ->rawColumns(['action'])
            ->make(true);
    }

    public function createProduct($productData, $variants, $images)
    {
        try {
            DB::beginTransaction();

            $product = $this->productRepository->createProduct($productData);

            foreach ($variants as $variant) {

                $variant['product_id'] = $product->id;
                $productVariant = $this->productVariantRepository->createProductVarinat($variant);

                foreach ($variant['attribute_values'] as $productVariantAttribute) {
                    $this->productVariantAttributeRepository->createProductVariantAttribute([
                        'product_variant_id' => $productVariant->id,
                        'attribute_value_id' => $productVariantAttribute
                    ]);
                }
            }

            $this->imageManagement->UploadImages($images, $product, 'products');


            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

}