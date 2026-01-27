<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a href="{{ route('dashboard.products.edit', $product->id) }}"
       class="btn btn-outline-success">{{ __('dashboard.edit') }}</a>
    <a href="javascript:void(0);" data-id="{{$product->id}}"
       class="btn btn-outline-primary change-status">{{ __('dashboard.change_status') }}</a>
    <a href="{{ route('dashboard.products.show', $product->id) }}" data-id="{{$product->id}}"
       class="btn btn-outline-info show-images">{{ __('dashboard.show') }}</a>
    <a href="javascript:void(0);" data-id="{{$product->id}}"
       class="btn btn-outline-danger delete-product delete">{{ __('dashboard.delete') }}</a>


</div>



