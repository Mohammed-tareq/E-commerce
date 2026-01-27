<div class="modal fade overflow-auto" id="createSliderModal" tabindex="-1" aria-labelledby="createSliderModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSliderModalLabel">{{ __('dashboard.create_slider') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none" id="error-block">
                    <ul id="error-list">
                    </ul>
                </div>

                <form id="create-slider-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">{{ __('dashboard.slider') }}</label>
                                <input type="text" class="form-control" id="note"
                                       placeholder="{{ __('placeHolder.name_ar') }}" name="note[ar]">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="noteEn">{{ __('dashboard.slider') }}</label>
                                <input type="text" class="form-control" id="noteEn"
                                       placeholder="{{ __('placeHolder.name_en') }}"
                                       name="note[en]">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="single-image">{{ __('dashboard.image') }}</label>
                                <input type="file" class="form-control"
                                       name="image" id="slider-image">
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




