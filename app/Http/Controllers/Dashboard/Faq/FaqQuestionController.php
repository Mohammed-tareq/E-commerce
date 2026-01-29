<?php

namespace App\Http\Controllers\Dashboard\Faq;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\FaqQuestionService;

class FaqQuestionController extends Controller
{
    public function __construct(protected FaqQuestionService $faqQuestionService){}

    public function index()
    {
        return view('dashboard.faq-question.index');
    }

    public function getFaqQuestionForDataTables()
    {
        return $this->faqQuestionService->getFaqQuestionForDataTables();
    }
    

    public function deleteFaqQuestion($id)
    {
        if(!$this->faqQuestionService->deleteFaqQuestion($id)){
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => __('dashboard.operation_error')
        ]);
    }
}
