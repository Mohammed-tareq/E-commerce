@push('css')
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous"/>
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/ar.js"></script>
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