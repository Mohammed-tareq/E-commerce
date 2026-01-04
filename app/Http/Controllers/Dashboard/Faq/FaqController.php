<?php

namespace App\Http\Controllers\Dashboard\Faq;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Faq\FaqRequest;
use App\Services\Dashboard\Dashboard\FaqService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Arr;

class FaqController extends Controller implements HasMiddleware
{

    public function __construct(protected FaqService $faqService)
    {
    }

    public static function middleware()
    {
        return ['can:faqs'];
    }

    public function index()
    {

        $faqs = $this->faqService->getFaqs();
        return view('dashboard.faq.index', compact('faqs'));
    }


    public function store(FaqRequest $request)
    {
        $data = Arr::only($request->validated(), ['question', 'answer']);
        $faq = $this->faqService->create($data);
        if (!$faq) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success'),
            'faq' => $faq
        ]);

    }




    public function update(FaqRequest $request,$id)
    {
        $data = Arr::only($request->validated(), ['question', 'answer']);

        if (!$this->faqService->update($data, $id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ]);
        }
        $faq = $this->faqService->getFaq($id);
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success'),
            'faq' => $faq
        ]);
    }


    public function destroy($id)
    {
        if (!$this->faqService->delete($id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ]);
    }
}
