<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a href="javascript:void(0);" data-id="{{ $attribute->id }}"
       data-name-ar="{{ $attribute->getTranslation('name', 'ar') }}"
       data-name-en="{{ $attribute->getTranslation('name', 'en') }}"
       data-values="{{ $attribute->attributeValues->map(function($value) {
            return [
                'id' => $value->id,
                'valueAr' => $value->getTranslation('value', 'ar'),
                'valueEn' => $value->getTranslation('value', 'en')
            ];
        })->toJson() }}"
       class="btn btn-outline-success edit-attribute">{{ __('dashboard.edit') }}</a>
    <a href="javascript:void(0);" data-id="{{ $attribute->id }}" class="btn btn-outline-danger delete-btn delete attribute-delete">{{ __('dashboard.delete') }}</a>
</div>



