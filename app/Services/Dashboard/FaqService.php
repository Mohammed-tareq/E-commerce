<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FaqRepository;
use Illuminate\Support\Facades\Cache;

class FaqService
{
    public function __construct( protected FaqRepository $faqRepository)
    {

    }

    public function getFaqs()
    {
        return $this->faqRepository->getFaqs();
    }

    public function getFaq($id)
    {
        return $this->faqRepository->getFaq($id) ?? abort(404);
    }

    public function create($data)
    {
        return $this->faqRepository->create($data);
    }

    public function update($data , $id)
    {
        $faq = self::getFaq($id);
        return $this->faqRepository->update($data , $faq);
    }

    public function delete($id)
    {
        $faq = self::getFaq($id);
        self::updateCache();
        return $this->faqRepository->delete($faq);
    }

    private function updateCache()
    {
        Cache::decrement('faqs_count');
    }

}