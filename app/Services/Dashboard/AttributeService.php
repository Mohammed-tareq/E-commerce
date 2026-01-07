<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AttributeRepository;
use App\Repositories\Dashboard\AttributeValueRepository;
use Illuminate\Support\Facades\DB;

class AttributeService
{

    public function __construct(protected AttributeRepository $attributeRepository, protected AttributeValueRepository $attributeValueRepository)
    {
    }

    public function getAttribute($id)
    {
        return $this->attributeRepository->getAttribute($id) ?? abort(404);
    }

    public function getAttributesList()
    {
        return $this->attributeRepository->getAttributes();
    }
    public function getAttributes()
    {
        $attributes = $this->attributeRepository->getAttributes();
        return DataTables::of($attributes)
            ->addIndexColumn()
            ->addColumn('name', function ($attribute) {
                return $attribute->getTranslation('name', app()->getLocale());
            })
            ->addColumn('attribute_values', function ($attribute) {
                return view('dashboard.attribute.data-table.attribute-value', compact('attribute'));
            })
            ->addColumn('action', function ($attribute) {
                return view('dashboard.attribute.data-table.action', compact('attribute'));
            })
            ->rawColumns(['action', 'attribute_values'])
            ->make(true);
    }

    public function createAttribute($data)
    {
        try {
            DB::beginTransaction();
            $attribute = $this->attributeRepository->createAttribute($data['name']);
            $result = collect($data['attribute_value'])->map(function ($item) {
                return [
                    'value' => $item
                ];
            });
            $this->attributeValueRepository->createOrUpdateAttributeValues($attribute, $result);
            Db::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            return false;
        }
    }


    public function updateAttribute($id, $data)
    {

        return DB::transaction(function () use ($id, $data) {

            $attribute = $this->getAttribute($id);
            if (!empty($data['name'])) {
                $this->attributeRepository->updateAttribute($attribute, $data['name']);
            }
            if (!empty($data['attribute_value'])) {
                $this->attributeValueRepository->deleteAttribute($attribute);
                $result = collect($data['attribute_value'])->map(function ($item) {
                    return [
                        'value' => $item,
                    ];
                });

                $this->attributeValueRepository->createOrUpdateAttributeValues($attribute, $result);
            } else {
                throw new \Exception(__('validation.attributes.attribute_value'));

            }

        });

    }

    public function deleteAttrbute($id)
    {
        $attribute = $this->getAttribute($id);
        return $this->attributeRepository->deleteAttribute($attribute);
    }

}