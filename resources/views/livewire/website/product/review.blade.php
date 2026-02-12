<div>

        <div class="product-review-section">
            <h5 class="intro-heading">{{ __('website.reviews') }}</h5>
            <div class="review-wrapper">
                @auth
                    <form wire:submit.prevent="submitReview">
                        <textarea class="form-control text-2xl" rows="6" wire:model="comment"></textarea>

                        <button type="submit" class="shop-btn">
                            {{ __('website.submit_review') }}
                        </button>
                    </form>

                @endauth

                @forelse($product->reviews as $review)
                    <div class="wrapper">
                        <div class="wrapper-aurthor">
                            <div class="wrapper-info">
                                <div class="aurthor-img">
                                    <img width="80px" height="80px" src="{{ asset($review->user->image) }}"
                                         alt="{{ $review->user->first_name }}">
                                </div>
                                <div class="author-details">
                                    <h5>{{ $review->user->first_name}} {{ $review->user->last_name }}</h5>
                                    <p>{{ $review->user->country->getTranslation('name',app()->getLocale()) }}
                                        , {{ $review->user->city->getTranslation('name',app()->getLocale()) }}</p>
                                </div>
                            </div>
                            <div class="ratings">
                                                    <span>
                                                    <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                          fill="#FFA800"/>
                                                    <path d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                          fill="#FFA800"/>
                                                    <path d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                          fill="#FFA800"/>
                                                    <path d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                          fill="#FFA800"/>
                                                    <path d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                          fill="#FFA800"/>
                                                    </svg>
                                                    </span>
                                <span>(5.0)</span>
                            </div>
                        </div>
                        <div class="wrapper-description">
                            <p class="wrapper-details">
                                {{ $review->comment }}
                            </p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@script
<script>
    $wire.on('review-add', (message) => {
        Swal.fire({
            position: "center",
            icon: "success",
            title: message,
            showConfirmButton: false,
            timer: 2000
        });
    })
</script>
@endscript
