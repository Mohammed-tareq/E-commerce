@push('js')
    <script>
        $(document).ready(function () {
            $('.delete-btn').on('click', function (e) {
                e.preventDefault();

                let id = $(this).data('id');

                swal({
                    title:" {{ __('dashboard.delete_alert') }}",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "{{ __('dashboard.cancel') }}!",
                            visible: true,
                            className: "btn-warning",
                            closeModal: false,
                        },
                        confirm: {
                            text: "{{ __('dashboard.delete') }}!",
                            visible: true,
                            className: "",
                            closeModal: false,
                        }
                    }
                }).then(isConfirm => {
                    if (isConfirm) {
                        $("#delete_" + id).submit();
                    } else {
                        swal("{{ __('dashboard.cancel') }}");
                    }
                });
            });
        })
    </script>
@endpush