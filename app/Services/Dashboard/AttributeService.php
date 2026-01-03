<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AttributeRepository;
use App\Repositories\Dashboard\AttributeValueRepository;
use Yajra\DataTables\DataTables;

class AttributeService
{

    public function __construct(protected AttributeRepository $attributeRepository, protected AttributeValueRepository $attributeValueRepository){}

    public function getAttribute($id)
    {
        return $this->attributeRepository->getAttribute($id) ?? abort(404);
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

    public function create($data)
    {
        return $this->attributeRepository->create($data);
    }

    public function update($id, $data)
    {
        $attribute = $this->getAttribute($id);
         return $this->attributeRepository->update($attribute, $data);
    }

    public function delete($id)
    {
        $attribute = $this->getAttribute($id);
        return $this->attributeRepository->delete($attribute);
    }

}