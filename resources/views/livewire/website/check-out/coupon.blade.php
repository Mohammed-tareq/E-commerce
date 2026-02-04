<div>
    @if(!empty($couponDetails))
        <p class="paragraph mt-2" style="color: rgb(210, 77, 77)">
            {{ $couponDetails }}
        </p>
    @endif
    @if($cartItems > 0 && $cart->coupon_id === null )
        <div class="review-form">
            <div class="account-inner-form">
                <div class="review-form-name">
                    <input wire:model="code" class="form-control" placeholder="Coupon Code">
                    <button wire:click.prevent="addCouponToCart" type="button" class="shop-btn mt-3">Apply</button>
                </div>
            </div>
        </div>
    @endif
</div>

@script
<script>
    $wire.on('coupon-added', (message) => {
        Swal.fire({
            position: "center",
            icon: "success",
            title: message,
            showConfirmButton: false,
            timer: 2000
        });
    })
    $wire.on('coupon_invalid', (message) => {
        Swal.fire({
            position: "center",
            icon: "error",
            title: message,
            showConfirmButton: false,
            timer: 2000
        });
    })
</script>
@endscript