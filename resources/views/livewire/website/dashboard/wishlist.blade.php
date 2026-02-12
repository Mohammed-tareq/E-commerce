<div>
    @if ($screen === "wishlist")
        <div class="tab-pane fade show active">
            <div class="wishlist">
                <div class="cart-content">
                    <h5 class="cart-heading">{{ __('website.wishlist') }}</h5>
                </div>
                @livewire('website.wish-list.wish-last-table')

            </div>
        </div>
    @endif
</div>

@script
<script>
    $wire.on('wishlist-changed', function (message) {
        Swal.fire({
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    })
    $wire.on('not-found', function (message) {
        Swal.fire({
            icon: 'error',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    })
</script>
@endscript