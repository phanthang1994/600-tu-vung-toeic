<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<head>
    @include('admin.layout.head')
</head>

<body>
@include('admin.layout.side_bar')
<!-- End Top Search -->
<div class="wrapper">
    <div class="main-panel">
        @include('admin.layout.header')
            @yield("body")
        @include('admin.layout.footer')
    </div>
</div>
<!-- Start Footer  -->
@include('admin.layout.foot')
@yield('js')
</body>
</html>
