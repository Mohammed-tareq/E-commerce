<form wire:submit.prevent="submit">
    <div class="question-section login-section">
        <div class="review-form">
            <h5 class="comment-title">{{ __('website.contact') }}</h5>
            <div class="account-inner-form">
                <div class="review-form-name">
                    <label for="fname" class="form-label">{{ __('website.name') }}*</label>
                    <input
                            type="text"
                            wire:model.live="name"
                            id="fname"
                            class="form-control"
                            placeholder="Name"
                    />
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="review-form-name">
                    <label for="email" class="form-label">{{ __('website.email') }}*</label>
                    <input
                            type="email"
                            wire:model.live="email"
                            id="email"
                            class="form-control"
                            placeholder="user@gmail.com"
                    />
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="review-form-name">
                    <label for="phone" class="form-label">{{ __('website.phone') }}*</label>
                    <input
                            type="text"
                            wire:model.live="phone"
                            id="phone"
                            class="form-control"
                            placeholder="+20165151151"
                    />
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="review-form-name">
                    <label for="subject" class="form-label">{{ __('website.subject') }}*</label>
                    <input
                            type="text"
                            id="subject"
                            wire:model.live="subject"
                            class="form-control"
                            placeholder="{{ __('website.subject') }}"
                    />
                    @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="review-textarea">
                <label for="floatingTextarea">{{ __('website.message') }}*</label>
                <textarea
                        class="form-control"
                        placeholder="{{ __('website.write_message') }}..........."
                        id="floatingTextarea"
                        rows="3"
                        wire:model.live="message"
                ></textarea>
                @error('message')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="login-btn">
                <button type="submit" class="shop-btn">{{ __('website.send_now') }}</button>
            </div>
        </div>
    </div>
</form>

@script
<script>
    $wire.on('success_contact', function (message) {
        Swal.fire({
            position: "center",
            icon: "success",
            title: message,
            showConfirmButton: false,
            timer: 2000
        });
    })
    $wire.on('error_contact', function (message) {
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