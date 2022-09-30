<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('/')}}front-assets/images/favicon.png" type="">
    <title>Ecommerce Site | @yield('title')</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front-assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="{{asset('/')}}front-assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('/')}}front-assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('/')}}front-assets/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('front.includes.header')
    <!-- end header section -->
    @yield('body')
<!-- footer start -->
@include('front.includes.footer')
<!-- footer end -->



<!-- jQery -->
<script src="{{asset('/')}}front-assets/js/jquery-3.6.0.min.js"></script>
<!-- popper js -->
<script src="{{asset('/')}}front-assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="{{asset('/')}}front-assets/js/bootstrap.js"></script>
    <!-- custom js -->
<script src="{{asset('/')}}front-assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!--comments & reply system script-->


    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value=$(caller).attr('data-commentId');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {


            $('.replyDiv').hide();
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

    <!--comments & reply system script-->



<!--toastr section-->

@if(Session::has('message'))
        <script>
            toastr.success('{{Session::get('message')}}');
        </script>
@endif


@if(Session::has('error'))
        <script>
            toastr.error('{{Session::get('error')}}');
        </script>
@endif
</body>
</html>
