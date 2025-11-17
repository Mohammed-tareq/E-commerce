<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="@if(app()->getLocale() === 'ar') rtl @else ltr @endif">
<head>
   @include('layouts.dashboard.includes.head')
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

@include('layouts.dashboard.auth.includes.nav')

@yield('content')


@include('layouts.dashboard.auth.includes.auth-script')
</body>
</html>