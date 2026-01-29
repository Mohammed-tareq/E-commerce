<?php

namespace App\Livewire\Website;

use App\Services\Website\FaqService;
use Livewire\Component;

class FaqQuestion extends Component
{
    public $name, $email, $subject, $message;

    protected $faqService;

    public function boot(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'email:rfc', 'min:3', 'max:30'],
            'subject' => ['required', 'string', 'min:3', 'max:60'],
            'message' => ['required', 'string', 'min:3', 'max:1000']
        ];

    }

    public function updated()
    {
        $this->validate();
    }

    public function submit()
    {
        $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message
        ];
        if (!$this->faqService->createFaqQuestion($data)) {
            $this->dispatch('error-faqQuestion', __('website.error_faqQuestion'));
            return false;
        }
        $this->reset();
        $this->dispatch('success-faqQuestion', __('website.success_faqQuestion'));

        return true;
    }

    public function render()
    {
        return view('livewire.website.faq-question');
    }
}
