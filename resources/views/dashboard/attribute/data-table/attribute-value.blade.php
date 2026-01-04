@foreach($attribute->attributeValues as $attributeValue)
    <span class="badge badge-primary px-2 mt-1 " style="font-size: 14px;">
        {{ $attributeValue->getTranslation('value', app()->getLocale()) }}
    </span>
@endforeach