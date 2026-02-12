<?php

namespace App\Livewire\Website\Dashboard;

use App\Models\ProductPreview;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Review extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $screen = 'dashboard';
    public $user;


    public function mount($authUser)
    {
        $this->user = $authUser;
    }

    #[On('change-screen')]
    public function changeScreen($screen)
    {
        $this->screen = $screen;
    }

    #[On('delete-review')]
    public function deleteReview($reviewId)
    {
        ProductPreview::find($reviewId)->delete();
        $this->dispatch('deleted-review', __('website.delete_review_success'));
    }

    public function render()
    {
        $reviews = ProductPreview::with('product.images')
            ->where('user_id', $this->user->id)
            ->latest()
            ->paginate(4) ;
        return view('livewire.website.dashboard.review', compact('reviews'));
    }
}
