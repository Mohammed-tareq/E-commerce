<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a href="{{ route('dashboard.pages.edit',$page->id)}}"
       class="btn btn-outline-success">{{ __('dashboard.edit') }}</a>
    <a href="javascript:void(0);" data-id="{{$page->id}}"
       class="btn btn-outline-info change-status">{{ __('dashboard.change_status') }}</a>
    <a href="javascript:void(0);" data-id="{{$page->id}}"
       class="btn btn-outline-danger delete_page  delete">{{ __('dashboard.delete') }}</a>


</div>



