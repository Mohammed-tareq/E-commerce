<?php

namespace App\Http\Controllers\Dashboard\Product\Attribute;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\AttributeService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AttributeController extends Controller implements HasMiddleware
{
    public function __construct(
        protected AttributeService $attributeService,
    ) {
    }
    public static function middleware()
    {
        return [
            new Middleware(['can:attributes']),
        ];
    }
    public function index()
    {
        return view('dashboard.attribute.index');
    }

    public function getAttributes()
    {
        return $this->attributeService->getAttributes();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
