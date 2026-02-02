<div>
    <div class="checkout-wrapper">
        <a href="" class="shop-btn" wire:click.prevent="SendDataUser">{{ __('website.user_my_account') }}</a>
        <div class="account-section billing-section">
            <h5 class="wrapper-heading">{{ __('website.shipping_details') }}</h5>
            <div class="review-form">
                <div class=" account-inner-form">
                    <div class="review-form-name">
                        <label for="fname" class="form-label">{{ __('website.first_name') }}*</label>
                        <input type="text" wire:model.live="fname" id="fname" class="form-control"
                               placeholder="{{ __('website.placeholder_first_name') }}">
                        @error('fname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="review-form-name">
                        <label for="lname" class="form-label">{{ __('website.last_name') }}*</label>
                        <input type="text" id="lname" wire:model.live="lname" class="form-control"
                               placeholder="{{ __('website.placeholder_last_name') }}">
                        @error('lname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class=" account-inner-form">
                    <div class="review-form-name">
                        <label for="email" class="form-label">{{ __('website.email') }}*</label>
                        <input type="email" id="email" wire:model.live="email" class="form-control"
                               placeholder="user@gmail.com">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="review-form-name">
                        <label for="phone" class="form-label">{{ __('website.phone') }}*</label>
                        <input type="tel" id="phone" wire:model.live="phone" class="form-control"
                               placeholder="+880388**0899">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="review-form-name">
                    <label for="country" class="form-label">{{ __('website.country') }}*</label>
                    <select id="country" class="form-select">
                        <option>Choose...</option>
                        @foreach ($countries as $country)
                            <option @selected($country->id === $countryId) value="{{ $country->id }}">{{ $country->getTranslation('name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="review-form-name">
                    <label for="governorate" class="form-label">{{ __('website.governorate') }}*</label>
                    <select id="governorate" class="form-select">
                        <option>Choose...</option>
                    @foreach ($governorates as $governorate)
                            <option @selected($governorate->id === $governorateId) value="{{ $governorate->id }}">{{ $governorate->getTranslation('name', app()->getLocale() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="review-form-name">
                    <label for="city" class="form-label">{{ __('website.city') }}*</label>
                    <select id="city" class="form-select">
                        <option>Choose...</option>
                       @foreach ($cities as $city)
                            <option @selected($city->id === $cityId) value="{{ $city->id }}">{{ $city->getTranslation('name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="review-form-name shipping">
                    <h5 class="wrapper-heading">{{ __('website.shipping_address') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
