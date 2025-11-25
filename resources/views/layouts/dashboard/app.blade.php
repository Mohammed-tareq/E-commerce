<!DOCTYPE html>
<html class="loading" lang="{{ app()->getLocale() }}" data-textdirection="@if(app()->getLocale() === 'ar') rtl @else ltr @endif">
<head>
   @include('layouts.dashboard.includes.head')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@include('layouts.dashboard.includes.nav')

@include('layouts.dashboard.includes.side-bar')

@yield('content')


@include('layouts.dashboard.includes.footer')

@include('layouts.dashboard.includes.script')


</body>
</html>