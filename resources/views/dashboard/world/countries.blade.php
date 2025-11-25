@extends('layouts.dashboard.app')


@section('title')
Countries
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
                                <li class="breadcrumb-item"><a href="index.html">{{ __('dashboard.countries') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.countries') }}</h4>
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
                                    <th>{{ __('dashboard.country_name') }}</th>
                                    <th>{{ __('dashboard.country_code') }}</th>
                                    <th>{{ __('dashboard.users_count') }}</th>
                                    <th>{{ __('dashboard.governorates_count') }}</th>
                                    <th>{{ __('dashboard.governorates') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($countries as $country )

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <a class="text-primary" href="{{ route('dashboard.countries.governorates', $country->id) }}">
                                                {{ $country->getTranslation('name', app()->getLocale()) }}
                                            </a>
                                        </td>
                                        <td><span class="badge badge-success px-2 ">
                                                {{ $country->phone_code }}
                                            </span>
                                        </td>
                                        <td><span class="badge badge-{{ $country->users()->count() > 0 ? 'success' : 'danger' }} px-2 ">
                                                {{ $country->users()->count() }}
                                            </span>
                                        </td>

                                        <td><span class="badge badge-{{ $country->governorates->count() > 0 ? 'success' : 'danger' }} px-2 ">
                                                {{ $country->governorates->count() }}
                                            </span>
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-outline-primary "
                                                    data-toggle="modal"
                                                    data-target="#bounceInDown_{{ $country->id  }}">
                                                {{ __('dashboard.governorates') }}
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal animated bounceInDown text-left"
                                                 id="bounceInDown_{{ $country->id }}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel47" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"
                                                                id="myModalLabel47">{{ __('dashboard.governorates') }}</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">

                                                                @forelse( $country->governorates as $key => $value)

                                                                    <div class="col-4 mb-2">
                                                                       <span class="badge bg-primary rounded-pill w-100 py-2 text-center"
                                                                             style="font-size: 14px;">
                                                                         {{ $value->getTranslation('name', app()->getLocale()) }}
                                                                       </span>
                                                                    </div>
                                                                @empty
                                                                    <div class="col-12 mb-2">
                                                                        <span class="badge bg-primary rounded-pill w-100 py-2 text-center"
                                                                              style="font-size: 14px;">
                                                                            {{ __('dashboard.no_governorates') }}
                                                                        </span>
                                                                    </div>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span id="status_{{ $country->id }}"
                                                  class="badge badge-{{ $country->status === __('dashboard.Active') ? 'success' : 'danger' }} px-2 ">
                                                {{ $country->status }}
                                            </span>
                                        </td>

                                        <td>

                                            <div class="float-left">
                                                <input type="checkbox" class="switchBootstrap change_status" id="switchBootstrap18" data-on-color="success"
                                                       data-off-color="danger" data-id="{{ $country->id }}" @checked($country->status === __('dashboard.Active'))/>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 mt-2 p-1">
                                {{ $countries->appends(request()->input())->links() }}
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
            let url = "{{ route('dashboard.countries.status', ':id') }}";
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
                        $('#status_' + id).text(data.country.status);
                        $('#status_' + id).removeClass('badge-success');
                        $('#status_' + id).removeClass('badge-danger');
                        $('#status_' + id).addClass(data.country.status === check ? 'badge-success' : 'badge-danger');
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

@endpush

