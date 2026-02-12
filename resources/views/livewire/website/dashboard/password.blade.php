<div>
    @if ($screen === "password")
        <div class="tab-pane fade show active">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="form-section">
                        <div class="currentpass form-item">
                            <label for="currentpass" class="form-label">{{ __('website.current_password') }}
                                *</label>
                            <input type="password" wire:model="oldPassword" class="form-control" id="currentpass"
                                   placeholder="******">
                            @error('oldPassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="password form-item">
                            <label for="pass" class="form-label">{{ __('website.new_password') }}*</label>
                            <input type="password" wire:model="newPassword" class="form-control" id="pass"
                                   placeholder="******">
                            @error('newPassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="re-password form-item">
                            <label for="repass" class="form-label">{{ __('website.confirm_password') }}*</label>
                            <input type="password" wire:model="newPassword_confirmation" class="form-control" id="repass"
                                   placeholder="******">
                            @error('newPassword_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-btn">
                            <button wire:click.prevent="updatePassword"
                                    class="shop-btn">{{ __('website.update_password') }}</button>
                            <a href="javascript:void(0)" class="shop-btn cancel-btn"
                               wire:click.prevent="ResetForm">{{ __('website.cancel') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="reset-img text-end">
                        <img src="{{ asset('assets/website/assets/images/homepage-one/reset.webp') }}" alt="reset">
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@script
<script>
    $wire.on('password-updated', function (message) {
        Swal.fire({
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    })
    $wire.on('error_password', function (message) {
        Swal.fire({
            icon: 'error',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    })
</script>
@endscript