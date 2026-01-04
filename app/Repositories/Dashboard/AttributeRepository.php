<?php

namespace App\Repositories\Dashboard;

use App\Models\Attribute;
use Illuminate\Support\Facades\DB;

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

    public function createAttribute($data)
    {
         return Attribute::create([
            'name' => $data,
        ]);
    }

    public function updateAttribute($attribute , $data)
    {
        return $attribute->update([
            'name' => $data,
        ]);
    }

    public function deleteAttribute($attribute)
    {
        return $attribute->delete();
    }
}