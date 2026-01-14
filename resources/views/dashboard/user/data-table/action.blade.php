<div class="btn-group" role="group" aria-label="Button group with nested dropdown">

    <a href="javascript:void(0);" data-id="{{ $user->id }}"
       class="btn btn-outline-info change-status">{{ __('dashboard.change_status') }}</a>

    <button data-id="{{ $user->id }}" class="btn btn-outline-danger delete-user">{{ __('dashboard.delete') }}</button>

</div>



