<div class="btn-group" role="group" aria-label="Button group with nested dropdown">

    <a href="{{route('dashboard.order.show', $order->id)}}"
       class="btn btn-outline-primary delete_faq  delete">{{ __('dashboard.show') }}</a>
    <a href="javascript:void(0);" data-id="{{$order->id}}"
       class="btn btn-outline-danger delete-order  delete">{{ __('dashboard.delete') }}</a>

</div>






