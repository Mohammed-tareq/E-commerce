<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\Product\ProductRepository;
use App\Repositories\Dashboard\Product\ProductVariantAttributeRepository;
use App\Repositories\Dashboard\Product\ProductVariantRepository;
use App\Utils\ImageManagement;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function __construct( protected ProductRepository $productRepository ,
                                protected ProductVariantRepository $productVariantRepository,
                                protected ProductVariantAttributeRepository $productVariantAttributeRepository,
                                protected ImageManagement $imageManagement){
    }

    public function createProduct($productData , $variants , $images)
    {
        try {
        DB::beginTransaction();

        $product = $this->productRepository->createProduct($productData);

            foreach($variants as $variant){

                $variant['product_id'] = $product->id;
                $productVariant = $this->productVariantRepository->createProductVarinat($variant);

                foreach ($variant['attribute_values'] as $productVariantAttribute) {
                    $this->productVariantAttributeRepository->createProductVariantAttribute([
                        'product_variant_id' => $productVariant->id,
                        'attribute_value_id' => $productVariantAttribute
                    ]);
                }
            }

            $this->imageManagement->UploadImages($images, $product , 'products');


        DB::commit();

        } catch (\Exception $e ) {
            DB::rollBack();
        }
    }

}