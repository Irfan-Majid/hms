

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset/assets/images/favicon.png')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('asset/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   
@stack('style')
    <!-- Custom CSS -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('asset/css/colors/blue.css')}}" id="theme" rel="stylesheet"><!--you can change theme color by changing this attribute-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
<![endif]-->
</head>


@include('layout.topelement')



@include('layout.navbar')






@yield('breadcumb')


<div class="card">
    <div class="card-body">

@yield('content')
    </div>
</div>
@include('layout.rightbar')



   <script src="{{asset('asset/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('asset/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('asset/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('asset/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('asset/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('asset/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
   
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="{{asset('asset/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
     <!--Custom JavaScript -->
     <script src="{{asset('asset/js/custom.min.js')}}"></script>
@stack('script')
    
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('asset/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>

</html>