<?php

namespace App\Repositories\Dashboard;

use App\Models\Attribute;

class AttributeRepository
{

    public function getAttributes()
    {
        return Attribute::with('attributeValues')->latest()->get();
    }

    public function getAttribute($id)
    {
        return Attribute::with('attributeValues')->find($id);
    }

    public function create($data)
    {
        return Attribute::create($data);
    }

    public function update($attribute , $data)
    {
        return $attribute->update($data);
    }

    public function delete($attribute)
    {
        return $attribute->delete();
    }
}