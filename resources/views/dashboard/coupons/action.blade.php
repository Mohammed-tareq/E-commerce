<div class="btn-group" role="group" aria-label="Button group with nested dropdown">

    <button type="button" class="btn btn-outline-success edit-coupon "
           data-id="{{ $coupon->id }}"
           data-coupon-code = "{{ $coupon->code }}"
           data-discount = "{{ $coupon->discount_percentage }}"
           data-start_date = "{{ $coupon->start_date }}"
           data-end_date = "{{ $coupon->end_date }}"
           data-limiter = "{{ $coupon->limiter }}"
           data-status = "{{ $coupon->status === __('dashboard.Active') ? 1 : 0 }}"
            data-bs-toggle="modal" data-bs-target="#editCouponModal"
    >{{ __('dashboard.edit') }}</button>

    <a href="javascript:void(0);" data-id="{{ $coupon->id }}"
       class="btn btn-outline-info change-status">{{ __('dashboard.change_status') }}</a>

    <a href="javascript:void(0);" data-id="{{ $coupon->id }}"
       class="btn btn-outline-danger delete-btn delete">{{ __('dashboard.delete') }}</a>

    <form id="delete_{{$coupon->id}}" action="{{ route('dashboard.coupons.destroy', $coupon->id) }}"
          method="post" style="display: none;">
        @csrf
        @method('delete')
    </form>
</div>



