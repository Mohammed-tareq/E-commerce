<?php

namespace App\Repositories\Dashboard;

use App\Models\Faq;

class FaqRepository
{

    public function getFaqs()
    {
        return Faq::orderBy('id')->get();
    }

    public function getFaq($id)
    {
        return Faq::find($id);
    }

    public function create($data)
    {
        return Faq::create($data);
    }

    public function update($data , $faq)
    {
        return $faq->update($data);
    }

    public function delete($faq)
    {
        return $faq->delete();
    }


}