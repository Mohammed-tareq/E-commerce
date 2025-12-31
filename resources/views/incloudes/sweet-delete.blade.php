@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.delete-btn', function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: true
                });

                swalWithBootstrapButtons.fire({
                    title: "{{ __('dashboard.delete_alert') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{ __('dashboard.delete') }}!",
                    cancelButtonText: "{{ __('dashboard.cancel') }}!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#delete_" + id).submit();
                        swalWithBootstrapButtons.fire({
                            title: "{{ __('dashboard.delete') }}",
                            text: "{{ __('dashboard.deleted') }}",
                            icon: "success"
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "{{ __('dashboard.cancel') }}",
                            icon: "error",
                        });
                    }
                });
            })
        })
    </script>

@endpush