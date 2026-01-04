
<div class="modal fade overflow-auto" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCouponModalLabel">{{ __('dashboard.edit_coupon') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none" id="error-block-edit">
                    <ul id="error-list-edit">
                    </ul>
                </div>

                <form id="update-coupon-form" method="post" >
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="code">{{ __('dashboard.code') }}</label>
                                <input type="text" class="form-control" id="coupon-code"
                                       placeholder="{{ __('placeHolder.code') }}" name="code">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="discount_percentage">{{ __('dashboard.discount_percentage') }}</label>
                                <input type="number" class="form-control" id="discount-percentage"
                                       placeholder="{{ __('placeHolder.discount_percentage') }}"
                                       name="discount_percentage">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="start-date">{{ __('dashboard.start_date') }}</label>
                                <input type="date" class="form-control" id="start-date"
                                       placeholder="{{ __('placeHolder.start_date') }}" name="start_date">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="end-date">{{ __('dashboard.end_date') }}</label>
                                <input type="date" class="form-control" id="end-date"
                                       placeholder="{{ __('dashboard.enter_end_date') }}" name="end_date">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="limit-used">{{ __('dashboard.limiter') }}</label>
                                <input type="number" class="form-control" id="limit-used"
                                       placeholder="{{ __('dashboard.limiter') }}" name="limiter">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <p><label>{{ __('dashboard.status') }}</label></p>
                                <input type="radio" id="status-active" name="status" value="1">
                                <label for="status-active">{{ __('dashboard.Active') }}</label>
                                <input type="radio" id="status-inactive" name="status" value="0"> <label
                                        for="status-inactive">{{ __('dashboard.Inactive') }}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('dashboard.edit') }}</button>
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ __('dashboard.close') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








