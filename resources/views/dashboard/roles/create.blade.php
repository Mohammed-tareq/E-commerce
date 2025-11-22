@extends('layouts.dashboard.app')

@session('title')
Roles | Create
@endsession



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.create.role') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.roles.index') }}">{{ __('dashboard.roles') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('dashboard.create.role') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">{{ __('dashboard.create.role') }}</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    @include('incloudes.validate-error')
                                    <div class="card-body">
                                        <form class="form" method="POST" action="{{ route('dashboard.roles.store') }}">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i
                                                            class="ft-shield"></i>{{ __('dashboard.roles') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.roles') }}</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="{{ __('placeHolder.role_ar') }}"
                                                                   name="name[ar]">
                                                        </div>
                                                        @error('name.ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{ __('dashboard.roles') }}</label>
                                                            <input type="text" id="projectinput2" class="form-control"
                                                                   placeholder="{{ __('placeHolder.role_en') }}"
                                                                   name="name[en]">
                                                        </div>
                                                        @error('name.en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <h4 class="form-section"><i
                                                            class="ft-shield"></i> {{ __('dashboard.permissions') }}
                                                </h4>
                                                <div class="row">

                                                    @if(app()->getLocale() == 'ar')
                                                        @foreach(config('permissions_ar') as $key => $value)
                                                            <div class="col-md-3 mb-2 d-flex align-items-center">
                                                                <input type="checkbox" id="toggle-{{$key}}"
                                                                       class="switchery" data-color="#FFB300"
                                                                       name="permissions[]" value="{{ $key }}"/>
                                                                <label for="toggle-{{$key}}" class="ml-1 mb-0">

                                                                    {{ $value }}

                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        @foreach(config('permissions_en') as $key => $value)
                                                            <div class="col-md-3 mb-2 d-flex align-items-center">
                                                                <input type="checkbox" id="toggle-{{$key}}"
                                                                       class="switchery" data-color="#FFB300"
                                                                       name="permissions[]" value="{{ $key }}"/>
                                                                <label for="toggle-{{$key}}" class="ml-1 mb-0">

                                                                    {{ $value }}

                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @error('permissions')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror


                                                </div>
                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ __('dashboard.create') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/dashboard') }}/vendors/js/forms/toggle/switchery.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
            elems.forEach(function (html) {
                if (!html.classList.contains('switchery-initialized')) {
                    new Switchery(html, {
                        color: html.dataset.color || '#4099ff', // لون الـ ON
                        secondaryColor: '#DDDDDD',             // لون الـ OFF
                        jackColor: '#FFFFFF',                   // لون الدائرة
                        size: 'default'                           // الحجم: small, default, large
                    });
                    html.classList.add('switchery-initialized');
                }
            });
        });
    </script>

@endpush



