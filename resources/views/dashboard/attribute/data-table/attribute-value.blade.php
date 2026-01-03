@foreach($attribute->attributeValues as $attributeValue)
    <span class="badge badge-success px-2 " style="font-size: 14px;">
        {{ $attributeValue->getTranslation('value', app()->getLocale()) }}
    </span>
@endforeach