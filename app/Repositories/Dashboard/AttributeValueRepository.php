<?php

namespace App\Repositories\Dashboard;

class AttributeValueRepository
{
    public function create($attribute, $data)
    {
        return $attribute->attribute_values()->create($data);
    }

    public function update($attributeValue, $data)
    {
        return $attributeValue->update($data);
    }

}