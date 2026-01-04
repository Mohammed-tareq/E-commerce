<div class="modal fade overflow-auto" id="editAttributeModal" tabindex="-1" aria-labelledby="editAttributeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAttributeModalLabel">{{ __('dashboard.edit_attribute') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"   id="error-block-edit">
                    <ul id="error-list-edit">
                    </ul>
                </div>

                <form id="update-attribute-form" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="edit_attribute_name_ar">{{ __('dashboard.attribute_name_ar') }}</label>
                                <input type="text" class="form-control" id="edit_attribute_name_ar"
                                       placeholder="{{ __('placeHolder.attribute_name_ar') }}"
                                       name="name[ar]">
                                <span class="text-danger error-message" id="error_edit_name_ar"></span>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="edit_attribute_name_en">{{ __('dashboard.attribute_name_en') }}</label>
                                <input type="text" class="form-control" id="edit_attribute_name_en"
                                       placeholder="{{ __('placeHolder.attribute_name_en') }}"
                                       name="name[en]">
                                <span class="text-danger error-message" id="error_edit_name_en"></span>
                            </div>
                        </div>
                    </div>
                    <div id="edit-values-container">


                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary float-left m-1" id="add-value-edit">
                                    <i class="la la-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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








