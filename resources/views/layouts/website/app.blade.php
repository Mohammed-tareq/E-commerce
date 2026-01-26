<!doctype html>
<html lang="en">

<head>
    @include('layouts.website.inc.head')
</head>
<body>
@include('layouts.website.inc.header')


@yield('content')


@include('layouts.website.inc.footer')

@include('layouts.website.inc.script')


</body>

</html>