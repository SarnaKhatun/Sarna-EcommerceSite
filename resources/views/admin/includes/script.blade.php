<script src="{{asset('/')}}admin-assets/js/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}admin-assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('/')}}admin-assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{asset('/')}}admin-assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="{{asset('/')}}admin-assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="{{asset('/')}}admin-assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('/')}}admin-assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('/')}}admin-assets/js/off-canvas.js"></script>
<script src="{{asset('/')}}admin-assets/js/hoverable-collapse.js"></script>
<script src="{{asset('/')}}admin-assets/js/misc.js"></script>
<script src="{{asset('/')}}admin-assets/js/settings.js"></script>
<script src="{{asset('/')}}admin-assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('/')}}admin-assets/js/dashboard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('message'))
    <script>
        toastr.success('{{Session::get('message')}}');
    </script>
@endif
