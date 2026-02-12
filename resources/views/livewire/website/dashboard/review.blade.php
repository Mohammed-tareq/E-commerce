<div>
    @if ($screen === 'review')
        <div class="tab-pane fade show active" id="v-pills-review" role="tabpanel" aria-labelledby="v-pills-review-tab"
             tabindex="0">
            <div class="top-selling-section">
                <div class="row g-5">
                    @forelse($reviews as $review)
                        <div class="col-md-6">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <img src="{{asset( $review->product->images()->first()->name) }}"
                                         alt="{{ $review->product->getTranslation('name', app()->getLocale()) }}">
                                </div>
                                <div class="product-info">
                                    <div class="review-date">
                                        <p>{{ $review->created_at->format('Y M D') }}</p>
                                    </div>
                                    <div class="ratings">
                                        <span>
                                            <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                        fill="#FFA800"/>
                                                <path
                                                        d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                        fill="#FFA800"/>
                                                <path
                                                        d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                        fill="#FFA800"/>
                                                <path
                                                        d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                        fill="#FFA800"/>
                                                <path
                                                        d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                        fill="#FFA800"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="product-description">
                                        <a href="{{ route('website.product.show',$review->product->slug) }}"
                                           class="product-details">
                                            {{ $review->product->getTranslation('name', app()->getLocale()) }}
                                        </a>
                                        <p>
                                            {{ Str::limit($review->comment, 20) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="product-cart-btn">
                                    <a href="cart.html" class="product-btn">{{ __("website.edit_review") }}</a>
                                    <a href="javascript:void(0)" data-id="{{ $review->id }}"
                                       class="product-btn delete_review">{{ __("website.delete_review") }}</a>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="blog-item" data-aos="fade-up">
                            <div class="cart-img">
                                <img src="{{ asset('assets/website/assets/images/homepage-one/empty-cart.webp') }}"
                                     alt="">
                            </div>
                            <div class="cart-content">
                                <p class="content-title">{{ __('website.empty_cart') }} </p>
                                <a href="product-sidebar.html" class="shop-btn">{{ __('website.back_to_shop') }}</a>
                            </div>
                        </div>
                    @endforelse

                    @if($reviews->hasPages())
                        <div class="d-flex justify-content-center text-center">
                            {{ $reviews->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

@script
<script>
    $(document).on('click', '.delete_review', function (e) {
        e.preventDefault();
        let review_Id = $(this).data('id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: "{{ __('dashboard.delete_alert') }}",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "{{ __('dashboard.delete') }}",
            cancelButtonText: "{{ __('dashboard.cancel') }}",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete-review', {
                    reviewId: review_Id
                });
            }
        });

        $wire.on('deleted-review', (message) => {
            Swal.fire({
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 1500
            })
        })
    });
</script>
@endscript
