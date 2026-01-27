<?php

namespace App\Http\Controllers\Dashboard\Product\Attribute;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Attribute\AttributeRequest;
use App\Services\Dashboard\Dashboard\AttributeService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Arr;

class AttributeController extends Controller implements HasMiddleware
{
    public function __construct(
        protected AttributeService $attributeService,
    )
    {
    }

    public static function middleware()
    {
        return [
            new Middleware('can:attributes'),
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


    public function store(AttributeRequest $request)
    {
        try{
            $data = Arr::only($request->validated(), ['name', 'attribute_value']);
            $this->attributeService->createAttribute($data);
            return response()->json([
                'status' => true,
                'message' => __('dashboard.operation_success')
            ], 200);
        }catch (\Throwable $e){
            report($e);
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 500);
        }


    }


    public function update(AttributeRequest $request, string $id)
    {
        try {
            $data = Arr::only($request->validated(), ['name', 'attribute_value']);
            $this->attributeService->updateAttribute($id, $data);
            return response()->json([
                'status' => true,
                'message' => __('dashboard.operation_success')
            ], 200);

        } catch (\Throwable $e) {
            report($e);
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }


    public function destroy($id)
    {
        if (!$this->attributeService->deleteAttrbute($id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ], 200);
    }
}
