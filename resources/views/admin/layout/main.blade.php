<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
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
