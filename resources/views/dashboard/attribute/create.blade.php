<div class="modal fade overflow-auto" id="createAttributeModal" tabindex="-1" aria-labelledby="createCouponModaLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAttributeModalLabel">{{ __('dashboard.create_attribute') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none" id="error-block">
                    <ul id="error-list">
                    </ul>
                </div>

                <form id="create-attribute-form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="attribute_name_ar">{{ __('dashboard.attribute_name_ar') }}</label>
                                <input type="text" class="form-control" id="attribute_name_ar"
                                       placeholder="{{ __('placeHolder.attribute_name_ar') }}" name="attribute_name[ar]">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="attribute_name_en">{{ __('dashboard.attribute_name_en') }}</label>
                                <input type="text" class="form-control" id="attribute_name_en"
                                       placeholder="{{ __('placeHolder.attribute_name_en') }}" name="attribute_name[en]">

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="attribute_value">{{ __('dashboard.attribute_value') }}</label>
                                    <input type="text" class="form-control" id="attribute_value"
                                           placeholder="{{ __('placeHolder.attribute_value') }}" name="attribute_value">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <p><label>{{ __('dashboard.status') }}</label></p>
                                    <input type="radio" id="status_active" name="status" value="1">
                                    name="discount_percentage">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger change-status" readonly id="delete-value">
                                       <i class="la la-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger change-status" readonly id="add-value">
                                    <i class="la la-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('dashboard.create') }}</button>
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








