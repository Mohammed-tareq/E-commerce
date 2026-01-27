<?php

namespace App\Services\Dashboard\Dashboard;

use App\Repositories\Dashboard\Product\ProductRepository;
use App\Repositories\Dashboard\Product\ProductVariantAttributeRepository;
use App\Repositories\Dashboard\Product\ProductVariantRepository;
use App\Utils\ImageManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public function getProductEagerLoad($id)
    {
        return $this->productRepository->getProductEagerLoad($id);
    }


    public function getProducts()
    {
        $products = $this->productRepository->getProducts();

        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('name', fn($product) => $product->getTranslation('name', app()->getLocale()))
            ->addColumn('has_variants', fn($product) => $product->hasVariants())
            ->addColumn('images', fn($product) => view('dashboard.product.data-table.image', compact('product')))
            ->addColumn('price', fn($product) => $product->price())
            ->addColumn('qty', fn($product) => $product->qty())
            ->addColumn('category', fn($product) => $product->category->getTranslation('name', app()->getLocale()))
            ->addColumn('brand', fn($product) => $product->brand->getTranslation('name', app()->getLocale()))
            ->addColumn('action', fn($product) => view('dashboard.product.data-table.action', compact('product')))
            ->rawColumns(['action', 'images'])
            ->make(true);
    }

    public function createProduct($productData, $variants, $images)
    {
        try {
            DB::beginTransaction();

            $product = $this->productRepository->createProduct($productData);

            if (!$product) {
                return false;
            }
            if (!empty($variants)) {
                foreach ($variants as $variant) {
                    $variant['product_id'] = $product->id;
                    $productVariant = $this->productVariantRepository->createProductVariant($variant);
                    if (!$productVariant) {
                        return false;
                    }

                    foreach ($variant['attribute_values'] as $productVariantAttribute) {
                        $productVariantAttributeCreated = $this->productVariantAttributeRepository->createProductVariantAttribute([
                            'product_variant_id' => $productVariant->id,
                            'attribute_value_id' => $productVariantAttribute
                        ]);
                        if (!$productVariantAttributeCreated) {
                            return false;
                        }
                    }
                }
            }

            $this->imageManagement->UploadImages($images, $product, 'products');

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateProduct($product, $productData, $variants , $images)
    {
        try {

            DB::beginTransaction();

            $productStatus = $this->productRepository->updateProduct($product, $productData);
            if (!$productStatus) {
                return false;
            }

            if (!empty($variants)) {

                $deleteProductVariant = $this->productVariantRepository->deleteProductVariantByProductId($product->id);
                if (!$deleteProductVariant)
                {
                    return false;
                }

                foreach ($variants as $variant) {
                    $variantCreated = $this->productVariantRepository->createProductVariant($variant);
                    if (!$variantCreated)
                    {
                        return false;
                    }

                    foreach ($variant['attribute_values'] as $attributeValues) {
                        $attributeValueCreated = $this->productVariantAttributeRepository->createProductVariantAttribute([
                            'product_variant_id' => $variantCreated->id,
                            'attribute_value_id' => $attributeValues
                        ]);
                        if (!$attributeValueCreated) {
                            return false;
                        }
                    }
                }
                $this->imageManagement->UploadImages($images , $product , 'products');
                DB::commit();
                return true;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function showProduct($id)
    {
        return $this->productRepository->getProductEagerLoad($id);
    }

    public function deleteProduct($id)
    {
        $product = $this->productRepository->getProduct($id);
        foreach ($product->images_path as $image) {
            $this->imageManagement->deleteImageFromLocal($image);
        }
        return $this->productRepository->deleteProduct($product);
    }

    public function changeStatus($id)
    {
        $product = $this->productRepository->getProduct($id);
        return $this->productRepository->changeStatus($product);
    }

    public function deleteVariant($productId, $variantId)
    {

        $product = $this->productRepository->getProductEagerLoad($productId);

        if ($product->variants->count() == 1) {
            return false;
        }
        $variant = $this->productVariantRepository->getProductVariant($variantId);
        if (!$variant) {
            return false;
        }

        if (!$this->productVariantRepository->deleteProductVariant($variant)) {
            return false;
        }

        return $this->productRepository->getProductEagerLoad($productId);

    }

    public function getProductSingleImage($imageId)
    {
        $image = $this->productRepository->deleteProductImage($imageId);
        if ($image) {
            return $image;
        }
        return false;
    }

    public function deleteProductImage($imageId, $imagePath)
    {
        if ($imagePath) {
            $this->imageManagement->deleteImageFromLocal($imagePath);
        }
        if ($imageId) {
            return $this->getProductSingleImage($imageId);
        }

    }

}
