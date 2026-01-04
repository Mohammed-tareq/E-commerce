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
                <div class="alert alert-danger" style="display:none"   id="error-block">
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
                                       placeholder="{{ __('placeHolder.attribute_name_ar') }}"
                                       name="name[ar]">
                                <span class="text-danger error-message" id="error_name_ar"></span>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="attribute_name_en">{{ __('dashboard.attribute_name_en') }}</label>
                                <input type="text" class="form-control" id="attribute_name_en"
                                       placeholder="{{ __('placeHolder.attribute_name_en') }}"
                                       name="name[en]">
                                <span class="text-danger error-message" id="error_name_en"></span>
                            </div>
                        </div>
                    </div>
                    <div class=" row add-row-value">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="attribute_value_ar">{{ __('dashboard.attribute_value_ar') }}</label>
                                <input type="text" class="form-control" id="attribute_value_ar"
                                       placeholder="{{ __('placeHolder.attribute_value_ar') }}"
                                       name="attribute_value[0][ar]">
                                <span class="text-danger error-message" id="error_attribute_value_0_ar"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="attribute_value_en">{{ __('dashboard.attribute_value_en') }}</label>
                                <input type="text" class="form-control" id="attribute_value_en"
                                       placeholder="{{ __('placeHolder.attribute_value_en') }}"
                                       name="attribute_value[0][en]">
                                <span class="text-danger error-message" id="error_attribute_value_0_en"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary float-left m-1" id="add-value">
                                    <i class="la la-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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








