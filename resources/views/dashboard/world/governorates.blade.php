@extends('layouts.dashboard.app')


@section('title')
    Governorates
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.countries') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.governorates') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.gov_shipping') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Hoverable rows start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('dashboard.governorates') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <form action="{{ url()->current() }}" method="get">
                                <div class="col-8 d-flex justify-content-start gap-3">
                                    <fieldset class="form-group">
                                        <input type="text" name="search" class="form-control " id="basicInput"
                                               placeholder="{{ __('dashboard.search') }}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <button type="submit" class="form-control" id="basicInput"><i
                                                    class="ft-search"></i></button>
                                    </fieldset>
                                </div>

                            </form>
                        </div>
                    </div>
                    @include('incloudes.tostar.tostar-success')
                    @include('incloudes.tostar.tostar-error')
                    <div class="card-content collapse show">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.governorate_name') }}</th>
                                    <th>{{ __('dashboard.country_name') }}</th>
                                    <th>{{ __('dashboard.users_count') }}</th>
                                    <th>{{ __('dashboard.city_count') }}</th>
                                    <th>{{ __('dashboard.cities') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                    <th>{{ __('dashboard.price') }}</th>
                                    <th>{{ __('dashboard.change_price') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($governorates as $governorate )

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-capitalize">
                                            <a class="text-primary">
                                                {{ $governorate->getTranslation('name', app()->getLocale()) }}
                                            </a>
                                        </td>
                                        <td><span class="badge badge-success px-2 ">
                                                {{ $governorate->country->getTranslation('name', app()->getLocale()) }}
                                            </span>
                                        </td>
                                        <td><span class="badge badge-{{ $governorate->users()->count() > 0 ? 'success' : 'danger' }} px-2 ">
                                                {{ $governorate->users()->count() }}
                                            </span>
                                        </td>

                                        <td><span class="badge badge-{{ $governorate->cities->count() > 0 ? 'success' : 'danger' }} px-2 ">
                                                {{ $governorate->cities->count() }}
                                            </span>
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-outline-primary "
                                                    data-toggle="modal"
                                                    data-target="#bounceInDown_{{ $governorate->id  }}">
                                                {{ __('dashboard.cities') }}
                                            </button>
                                            <!-- Modal -->
                                            @include('dashboard.world.incloudes.data-model', compact('governorate'))

                                        </td>
                                        <td>
                                            <span id="status_{{ $governorate->id }}"
                                                  class="badge badge-{{ $governorate->status === __('dashboard.Active') ? 'success' : 'danger' }} px-2 ">
                                                {{ $governorate->status }}
                                            </span>
                                        </td>

                                        <td>

                                            <div class="float-left">
                                                <input type="checkbox" class="switchBootstrap change_status"
                                                       id="switchBootstrap18" data-on-color="success"
                                                       data-off-color="danger"
                                                       data-id="{{ $governorate->id }}" @checked($governorate->status === __('dashboard.Active'))/>
                                            </div>

                                        </td>
                                        <td>

                                            <span class="badge badge-success px-2 " id="price_{{ $governorate->id }}">
                                                {{ $governorate->shippingPrices->price }}
                                            </span>

                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-outline-primary"
                                                    data-toggle="modal"
                                                    data-target="#bounceInDown2_{{ $governorate->id  }}">
                                                {{ __('dashboard.change_price') }}
                                            </button>
                                            <!-- Modal -->
                                            @include('dashboard.world.incloudes.gov-price-form', compact('governorate'))
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 mt-2 p-1">
                                {{ $governorates->appends(request()->input())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hoverable rows end -->
    </div>
@endsection

@push('js')

    <script>
        $(document).on('switchChange.bootstrapSwitch', '.change_status', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = "{{ route('dashboard.governorates.status', ':id') }}";
            url = url.replace(':id', id);
            let check = "{{ __('dashboard.Active')}}"
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    if (data.status) {
                        $('#tostar-success').show();
                        $('#tostar-success').text(data.message);
                        setTimeout(function () {
                            $('#tostar-success').hide();
                        }, 3000);
                        $('#status_' + id).text(data.governorate.status);
                        $('#status_' + id).removeClass('badge-success');
                        $('#status_' + id).removeClass('badge-danger');
                        $('#status_' + id).addClass(data.governorate.status === check ? 'badge-success' : 'badge-danger');
                    } else {
                        $('#tostar-error').show();
                        $('#tostar-error').text(data.message);
                        setTimeout(function () {
                            $('#tostar-error').hide();
                        }, 3000);
                    }
                },
                error: function (data) {
                    console.log(data.responseJSON.message);
                }
            })

        })
    </script>

    <script>
        $(document).on('submit', '.update_shipping_price', function (e) {
            e.preventDefault();
            let data = new FormData($(this)[0]);
            let id = $(this).data('id');
            let url = "{{ route('dashboard.governorates.price', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#errors_' + id).hide();

                    if (data.status) {
                        $('#tostar-success').show().text(data.message);
                        // change price
                        $('#price_' + id).empty();
                        $('#price_' + id).text(data.data.price);
                        $('#bounceInDown2_' + id).modal('hide');
                        $('.input_price_' + id).val('');

                        setTimeout(function () {
                            $('#tostar_success').hide();
                        }, 3000);

                    }
                },
                error: function (data) {
                    var response = $.parseJSON(data.responseText);
                    $('#errors_' + id).text(response.errors.price).show();
                },
            });
        });
    </script>
@endpush

