<button type="button" class="btn btn-outline-primary" data-toggle="modal"
        data-target="#content-message{{ $faqQuestion->id }}">
    {{ __('dashboard.content') }}
</button>

<div class="modal fade animated rollIn text-left" id="content-message{{ $faqQuestion->id }}"
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('dashboard.content') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div>
                   <p class="text-bg-dark"> {{ $faqQuestion->message }}</p>
                </div>

            </div>
        </div>
    </div>
</div>



