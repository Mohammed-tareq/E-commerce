<!DOCTYPE html>
<html class="loading" lang="{{ app()->getLocale() }}"
      data-textdirection="@if (app()->getLocale() === 'ar') rtl @else ltr @endif">

<head>
    @include('layouts.dashboard.includes.head')
    @livewireStyles
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
@include('layouts.dashboard.includes.nav')

@include('layouts.dashboard.includes.side-bar')

@yield('content')


@include('layouts.dashboard.includes.footer')

@include('layouts.dashboard.includes.script')

@livewireScripts

{{-- broad cast--}}

<script>
    let layout = 'admin';
    let adminId = {{ auth('admin')->user()->id }};
    let showNotificationRoute = '{{ route('dashboard.order.show',":id") }}';
</script>
<script src="{{ asset('build/assets/app-nqlKHGlj.js') }}"></script>
</body>

</html>
