<?php

namespace App\Repositories\Dashboard;

use Illuminate\Support\Facades\DB;

class AttributeValueRepository
{
    public function createOrUpdateAttributeValues($attribute, $data)
    {
         return  $attribute->attributeValues()->createMany($data);
    }


    public function deleteAttribute($attribute)
    {
        return $attribute->attributeValues()->delete();
    }



}