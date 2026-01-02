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
            @if(!is_null($dataEdit))
            initialPreviewAsData: true,
            initialPreview: ['{{ asset($dataEdit) }}'],
            @endif
        });
    </script>
@endpush