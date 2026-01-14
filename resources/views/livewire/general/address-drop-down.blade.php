<div>
    <div class="form-group">
        <label for="country">{{ __('dashboard.country') }}</label>
        <select name="country_id" id="country" wire:model.live="countryId"
                class="form-control">
            <option selected >{{ __('placeHolder.country') }}</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->getTranslation('name', app()->getLocale()) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="governorate">{{ __('dashboard.governorate') }}</label>
        <select name="governorate_id" id="governorate" wire:model.live="governorateId"
                class="form-control">
            <option selected >{{ __('placeHolder.governorate') }}</option>
            @foreach ($governorates as $governorate)
                <option value="{{ $governorate->id }}">{{ $governorate->getTranslation('name', app()->getLocale()) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="city">{{ __('dashboard.city') }}</label>
        <select name="city_id" id="city" wire:model="cityId"
                class="form-control">
            <option selected >{{ __('placeHolder.city') }}</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->getTranslation('name', app()->getLocale()) }}</option>
            @endforeach
        </select>
    </div>

</div>
