@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.contact') }}
@endsection



@section('content')

    <div class="app-content content">
        <div class="sidebar-left col-5 mt-3">
            <div class="sidebar">
                <div class="sidebar-content email-app-sidebar d-flex">
                    {{--  contact side-bar--}}
                    @livewire('dashboard.contact.contact-side-bar')

                    {{--contact message--}}
                    @livewire('dashboard.contact.contact-message')
                </div>
            </div>
        </div>
        {{-- contact show--}}
        @livewire('dashboard.contact.contact-show')
    </div>
@endsection

@push('js')

    <script>

        document.addEventListener('livewire:init', () => {
            Livewire.on('ask-delete', (id) => {
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
                    confirmButtonText: "{{ __('dashboard.delete') }}",
                    cancelButtonText: "{{ __('dashboard.cancel') }}",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete-message', [id] );
                    }
                });
            });

            Livewire.on('message-deleted', (msg) => {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: msg,
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        })
    </script>
@endpush

