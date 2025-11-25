<div class="modal animated bounceInDown text-left"
     id="bounceInDown_{{ $governorate->id }}"
     tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel47" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="myModalLabel47">{{ __('dashboard.cities') }}</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    @forelse( $governorate->cities as $key => $value)

                        <div class="col-4 mb-2">
                           <span class="badge bg-primary rounded-pill w-100 py-2 text-center"
                                 style="font-size: 14px;">
                             {{ $value->getTranslation('name', app()->getLocale()) }}
                           </span>
                        </div>
                    @empty
                        <div class="col-12 mb-2">
                            <span class="badge bg-primary rounded-pill w-100 py-2 text-center"
                                  style="font-size: 14px;">
                                {{ __('dashboard.no_cities') }}
                            </span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>