<div class="modal animated bounceInDown text-left"
     id="bounceInDown2_{{ $governorate->id }}"
     tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel47" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="myModalLabel47">{{ __('dashboard.change_price') }}</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display: none" id="errors_{{ $governorate->id }}"></div>
                <form class="update_shipping_price" data-id="{{ $governorate->id }}"
                      action="{{ route('dashboard.governorates.price', $governorate->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <fieldset class="form-group">
                            <input type="number" name="price"
                                   class="form-control input_price_{{ $governorate->id }} "
                                   id="basicInput"
                                   placeholder="{{ __('dashboard.price') }}">
                        </fieldset>
                        <fieldset class="form-group">
                            <button type="submit"
                                    data-id="{{ $governorate->id }}"
                                    class="form-control save_btn_price  btn bg-primary text-white"
                                    id="basicInput">{{ __('dashboard.save') }}</button>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>