<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a href="#"
       class="btn btn-outline-success">{{ __('dashboard.edit') }}</a>
    <a href="javascript:void(0);" data-id="" class="btn btn-outline-info change-status">{{ __('dashboard.change_status') }}</a>
    <a href="javascript:void(0);" data-id="" class="btn btn-outline-danger delete-btn delete">{{ __('dashboard.delete') }}</a>

    <form id="delete_" action="#"
          method="post" style="display: none;">
        @csrf
        @method('delete')
    </form>
</div>



