<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.cms.header')
</head>
<body>
    <!-- navigation -->
    @include('layouts.cms.navigation')

    <!-- content -->

    @yield('content')
    <!-- start footer -->
    @include('layouts.cms.footer')

    <!-- scripts -->
    @include('layouts.cms.scripts')
    @yield('scripts')

</body>
</html>