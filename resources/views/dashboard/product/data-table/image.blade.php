<button type="button" class="btn btn-outline-primary" data-toggle="modal"
        data-target="#show-images-product-{{ $product->id }}">
    {{ __('dashboard.images') }}
</button>

<div class="modal fade animated rollIn text-left" id="show-images-product-{{ $product->id }}"
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $product->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('dashboard.image') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div id="carousel-{{ $product->id }}" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($product->images as $image)
                            <li data-target="#carousel-{{ $product->id }}" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($product->images as  $image)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset('uploads/products/' . $image->name) }}" class="d-block w-100"
                                     style="max-height: 400px; object-fit: contain;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-{{ $product->id }}" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-{{ $product->id }}" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>



