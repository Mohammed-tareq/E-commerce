<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FaqQuestionRepository;
use Yajra\DataTables\DataTables;

class FaqQuestionService
{
    public function __construct(protected FaqQuestionRepository $faqQuestionRepository){}

    public function getFaqQuestions()
    {
        return $this->faqQuestionRepository->getFaqQuestions();
    }

    public function getFaqQuestionForDataTables()
    {
        $faqs =  $this->getFaqQuestions();

        return DataTables::of($faqs)
            ->addIndexColumn()
            ->addColumn('message', function ($faqQuestion) {
                return view('dashboard.faq-question.data-table.message', compact('faqQuestion'));
            })
            ->addColumn('action', function ($faqQuestion) {
                return view('dashboard.faq-question.data-table.action', compact('faqQuestion'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getFaqQuestion($id)
    {
        return $this->faqQuestionRepository->getFaqQuestion($id);
    }


    public function deleteFaqQuestion($id)
    {

        if (!$faqQuestion = $this->faqQuestionRepository->getFaqQuestion($id)) {
            return false;
        }
        return $this->faqQuestionRepository->deleteFaqQuestion($faqQuestion);
    }

}