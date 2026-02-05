<?php

namespace App\Http\Controllers\Website\Faq;

use App\Http\Controllers\Controller;
use App\Services\Website\FaqService;

class FaqController extends Controller
{
    public function __construct(protected FaqService $faqService)
    {
    }

    public function index()
    {
        $faqs = $this->faqService->getFaqs();
        return view('website.pages.faq',compact('faqs'));
    }

}

