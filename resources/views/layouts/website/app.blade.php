<!doctype html>
<html lang="en">

<head>
    @include('layouts.website.inc.head')
    @livewireStyles
</head>
<body>
@include('layouts.website.inc.header')


@yield('content')


@include('layouts.website.inc.footer')

@livewireScripts
@include('layouts.website.inc.script')

</body>

</html>