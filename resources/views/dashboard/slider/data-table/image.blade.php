<button type="button" class="btn btn-outline-primary" data-toggle="modal"
        data-target="#showImageSlider-{{ $slider->id }}">
    {{ __('dashboard.images') }}
</button>


<div class="modal fade overflow-auto" id="showImageSlider-{{ $slider->id }}" tabindex="-1" aria-labelledby="createSliderModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset($slider->image) }}" class="d-block w-100" style="max-height: 400px; object-fit: contain;">
            </div>
        </div>
    </div>
</div>





