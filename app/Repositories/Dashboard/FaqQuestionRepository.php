<?php

namespace App\Repositories\Dashboard;

use App\Models\FaqQuestion;

class FaqQuestionRepository
{
    public function getFaqQuestions()
    {
        return FaqQuestion::all();
    }

    public function getFaqQuestion($id)
    {
        return FaqQuestion::find($id);
    }

    public function deleteFaqQuestion($faqQuestion)
    {
        return $faqQuestion->delete();
    }

}