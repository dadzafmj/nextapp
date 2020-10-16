<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    
       <title>Polyclinique Next Application</title>

    <!-- Favicons -->
    @include('layouts.listing_css_for_app')
    
    


    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>NEXT  <span class="color danger">POLYCLINIQUE</span></b></a>
            <!--logo end-->
           
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                <form  action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit" class="btn btn-primary ">{{ __('Deconecter') }}</button>
            </form>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        @include('layouts.sidebar')
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            
            
            @yield('content')
           
            
            
            
            <!-- /wrapper -->
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        <!--footer start-->
        
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
<!-- argon-->


    


    <script src="{{asset('lib')}}/fancybox/jquery.fancybox.js"></script>
    <script src="{{asset('lib')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('lib')}}/jquery/jquery.min.js"></script>
    <script class="include" type="text/javascript" src="{{asset('lib')}}/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{asset('lib')}}/jquery.scrollTo.min.js"></script>
    <script src="{{asset('lib')}}jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{asset('lib')}}/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript">
        $(function() {
            //    fancybox
            jQuery(".fancybox").fancybox();
        });
    </script>


        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
   
      
<!-- end argon -->

</body>

</html>