<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommerce Admin | @yield('title')</title>
    <!-- plugins:css -->
    @include('admin.includes.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.includes.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        @include('admin.includes.header')
        <!-- partial -->
        <div class="main-panel">
            @yield('body')
            <!-- content-wrapper ends -->
            @include('admin.includes.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.includes.script')
<!-- End custom js for this page -->
</body>
</html>
