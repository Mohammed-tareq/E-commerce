@include( 'incloudes.file-input.links')
@push('js')
    <script>
        let lang = "{{ app()->getLocale() }}";
        $("#single-image").fileinput({
            theme: "fa5",
            language: lang,
            showUpload: false,
            showCancel: false,
            showClose: true,
            maxFileCount: 1,
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg','jpeg','png','gif','svg','webp'],

            @if(!empty($dataEdit))
            initialPreviewAsData: true,
            initialPreview: ['{{ asset($dataEdit) }}'],
            initialPreviewConfig: [
                { showRemove: false}
            ],
            @endif
        });
    </script>
@endpush