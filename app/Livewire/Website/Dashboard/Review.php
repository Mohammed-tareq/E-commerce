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

    public $showModel = false;
    public $editComment, $editReviewId;


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

    public function getReview($id)
    {
        $review = ProductPreview::find($id);
        $this->editComment = $review->comment;
        $this->editReviewId = $review->id;
        $this->showModel = true;
    }

    public function updateComment()
    {
        $this->validate([
            'editComment' => ['required', 'string', 'min:4', 'max:1000']
        ]);

        ProductPreview::where('id', $this->editReviewId)->update([
            'comment' => $this->editComment
        ]);
        $this->showModel = false;

        $this->dispatch('edit-review', __('website.edit_review_success'));
    }

    public function render()
    {
        $reviews = ProductPreview::with('product.images')
            ->where('user_id', $this->user->id)
            ->latest()
            ->paginate(4);
        return view('livewire.website.dashboard.review', compact('reviews'));
    }
}
