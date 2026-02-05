<div>
    <div class="checkout-wrapper">
        {{--        <a href="" class="shop-btn" wire:click.prevent="SendDataUser">{{ __('website.user_my_account') }}</a>--}}
        <div class="account-section billing-section">
            <h5 class="wrapper-heading">{{ __('website.shipping_details') }}</h5>
            <div class="review-form">
                <form action="{{ route('website.checkout.store') }}" method="post">
                    @csrf
                    <div class=" account-inner-form">
                        <div class="review-form-name">
                            <label for="fname" class="form-label">{{ __('website.first_name') }}*</label>
                            <input type="text" name="first_name" id="fname" class="form-control"
                                   placeholder="{{ __('website.placeholder_first_name') }}">
                            @error('first_name' )
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="review-form-name">
                            <label for="lname" class="form-label">{{ __('website.last_name') }}*</label>
                            <input type="text" name="last_name" id="lname" class="form-control"
                                   placeholder="{{ __('website.placeholder_last_name') }}">
                            @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class=" account-inner-form">
                        <div class="review-form-name">
                            <label for="email" class="form-label">{{ __('website.email') }}*</label>
                            <input type="email" id="email" name="user_email" class="form-control"
                                   placeholder="user@gmail.com">
                            @error('user_email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="review-form-name">
                            <label for="phone" class="form-label">{{ __('website.phone') }}*</label>
                            <input type="text" id="phone" name="user_phone" class="form-control"
                                   placeholder="+880388**0899">
                            @error('user_phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="review-form-name mt-3">
                        <label for="country" class="form-label">{{ __('website.country') }}*</label>
                        <select id="country" class="form-select" name="country_id" wire:model.live="countryId">
                            <option>Choose...</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->getTranslation('name', app()->getLocale()) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="review-form-name mt-3">
                        <label for="governorate" class="form-label">{{ __('website.governorate') }}*</label>
                        <select id="governorate" class="form-select" name="governorate_id"
                                wire:model.live="governorateId">
                            <option>Choose...</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}">{{ $governorate->getTranslation('name', app()->getLocale()) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="review-form-name mt-3">
                        <label for="city" class="form-label">{{ __('website.city') }}*</label>
                        <select id="city" class="form-select" name="city_id" wire:model.live="cityId">
                            <option>Choose...</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->getTranslation('name', app()->getLocale()) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="review-form-name mt-3">
                        <label for="notes" class="form-label">{{ __('website.enter_report_note') }}*</label>
                        <input type="text" id="notes" name="notes" class="form-control"
                               placeholder="{{  __('website.enter_report_note') }}">
                        @error('notes')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="review-form-name mt-3">
                        <label for="notes" class="form-label">{{ __('website.street') }}*</label>
                        <input type="text" id="notes" name="street" class="form-control"
                               placeholder="{{  __('website.enter_report_note') }}">
                        @error('street')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <btn class="shop-btn mt-2" type="submit">{{ __('website.user_my_account') }}</btn>
                </form>
            </div>
        </div>
    </div>
</div>
