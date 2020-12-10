<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-57SQS65');</script>
    <!-- End Google Tag Manager -->
    <title>
        {{ config('app.name') }}
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/css/bootstrap-submenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('real-house/css/leaflet.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('real-house/css/map.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/fonts/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('real-house/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('real-house/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('real-house/css/slick.css')}}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('real-house/css/skins/default.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('real-house/img/favicon.ico')}}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="../../fonts.googleapis.com/css_family=Open+Sans_400,300,600,700,800_Playfair+Display_400,700_Roboto_100,300,400,400i,500,700.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{asset('real-house/css/ie10-viewport-bug-workaround.css')}}">

    <script  src="{{asset('real-house/js/ie-emulation-modes-warning.js')}}"></script>
</head>
<body>
{{-- <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57SQS65"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div> --}}

<!-- Main header start -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="index.html">
                <img src="{{asset('real-house/img/logos/logo.png')}}" alt="logo">
            </a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Index
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.html">Index 1</a></li>
                            <li><a class="dropdown-item" href="index-2.html">Index 2</a></li>
                            <li><a class="dropdown-item" href="index-3.html">Index 3</a></li>
                            <li><a class="dropdown-item" href="index-4.html">Index 4</a></li>
                            <li><a class="dropdown-item" href="index-5.html">Index 5 (Video)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Properties
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">List Layout</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-list-rightside.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-list-leftsidebar.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-list-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Grid Layout</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-grid-rightside.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-grid-leftside.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-grid-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Map View</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-map-rightside-list.html">Map List Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-map-leftside-list.html">Map List Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-map-rightside-grid.html">Map Grid Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-map-leftside-grid.html">Map Grid Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-map-full.html">Map FullWidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property Detail</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-details.html">Property Detail 1</a></li>
                                    <li><a class="dropdown-item" href="properties-details-2.html">Property Detail 2</a></li>
                                    <li><a class="dropdown-item" href="properties-details-3.html">Property Detail 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown megamenu-li">
                        <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <div class="megamenu-area">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="about.html">About 1</a>
                                            <a class="dropdown-item" href="about-2.html">About 2</a>
                                            <a class="dropdown-item" href="properties-list-rightside.html">Properties List</a>
                                            <a class="dropdown-item" href="properties-grid-rightside.html">Properties Grid</a>
                                            <a class="dropdown-item" href="properties-comparison.html">Properties Comparison</a>
                                            <a class="dropdown-item" href="search-brand.html">Properties Brands</a>
                                            <a class="dropdown-item" href="services-1.html">Services 1</a>
                                            <a class="dropdown-item" href="services-2.html">Services 2</a>
                                            <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                            <a class="dropdown-item" href="elements.html">Elements</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="agent-list.html">Agent List 1</a>
                                            <a class="dropdown-item" href="agent-list-2.html">Agent List 2</a>
                                            <a class="dropdown-item" href="agent-grid.html">Agent Grid 1</a>
                                            <a class="dropdown-item" href="agent-grid-2.html">Agent Grid 2</a>
                                            <a class="dropdown-item" href="agent-detail.html">Agent Detail</a>
                                            <a class="dropdown-item" href="pricing-tables.html">Pricing Tables 1</a>
                                            <a class="dropdown-item" href="pricing-tables-2.html">Pricing Tables 2</a>
                                            <a class="dropdown-item" href="pricing-tables-3.html">Pricing Tables 3</a>
                                            <a class="dropdown-item" href="typography.html">Typography</a>
                                            <a class="dropdown-item" href="typography-2.html">Typography 2</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="contact.html">Contact 1</a>
                                            <a class="dropdown-item" href="contact-2.html">Contact 2</a>
                                            <a class="dropdown-item" href="contact-3.html">Contact 3</a>
                                            <a class="dropdown-item" href="gallery-3column.html">Gallery 3 column</a>
                                            <a class="dropdown-item" href="gallery-4column.html">Gallery 4 column</a>
                                            <a class="dropdown-item" href="gallery-6column.html">Gallery 6 column</a>
                                            <a class="dropdown-item" href="faq.html">Faq 1</a>
                                            <a class="dropdown-item" href="faq-2.html">Faq 2</a>
                                            <a class="dropdown-item" href="faq-3.html">Faq 3</a>
                                            <a class="dropdown-item" href="icon.html">Icon</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="my-profile.html">My profile</a>
                                            <a class="dropdown-item" href="my-properties.html">My Properties</a>
                                            <a class="dropdown-item" href="favorited-properties.html">Favorited Properties</a>
                                            <a class="dropdown-item" href="submit-property.html">Submit Property</a>
                                            <a class="dropdown-item" href="login.html">Login</a>
                                            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                                            <a class="dropdown-item" href="change-password.html">Change Password</a>
                                            <a class="dropdown-item" href="signup.html">Register</a>
                                            <a class="dropdown-item" href="404.html">Pages 404</a>
                                            <a class="dropdown-item" href="404-2.html">Pages 404 2</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Classic</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-classic-sidebar-right.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-classic-sidebar-left.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-classic-fullwidth.html">FullWidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Columns</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-columns-2col.html">2 Columns</a></li>
                                    <li><a class="dropdown-item" href="blog-columns-3col.html">3 Columns</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Masonry</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-masonry-2col.html">2 Masonry</a></li>
                                    <li><a class="dropdown-item" href="blog-masonry-3col.html">3 Masonry</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Blog Details</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-single-sidebar-right.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-single-sidebar-left.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-single-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="submit-property.html" class="nav-link link-color"><i class="fa fa-plus"></i> Submit Property</a>
                    </li>
                    <li class="nav-item">
                        <a href="#full-page-search" class="nav-link link-color"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
            </div> --}}
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Content field -->
@yield('content')
<!-- Content field -->

<!-- Footer start -->
<div id="footer">
    <footer class="footer">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>Contact Us</h4>
    
                        <ul class="contact-info">
                            <li>
                                Address: 20/F Green Road, Dhanmondi, Dhaka
                            </li>
                            <li>
                                Email: <a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                            </li>
                            <li>
                                Phone: <a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                            </li>
                            <li>
                                Fax: +0477 85X6 552
                            </li>
                        </ul>
    
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            Useful Links
                        </h4>
                        <ul class="links">
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Home</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>About Us</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Services</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>properties Details</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>My Account</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>properties Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>
                            Gallery
                        </h4>
    
                        <ul class="gallery">
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-1.jpg" alt="sub-properties">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-2.jpg" alt="sub-properties">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-3.jpg" alt="sub-properties">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-4.jpg" alt="sub-properties">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-6.jpg" alt="sub-properties">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-5.jpg" alt="sub-properties">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-7.jpg" alt="sub-properties">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="real-house/img/sub-properties/sub-properties-8.jpg" alt="sub-properties">
                                </a>
                            </li>
                        </ul>
    
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>Subscribe</h4>
                        <div class="Subscribe-box">
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                            <form action="#" method="GET">
                                <p>
                                    <input type="text" class="form-contact" name="email" placeholder="Enter Address">
                                </p>
                                <p>
                                    <button type="submit" name="submitNewsletter" class="btn btn-block button-theme">
                                        Subscribe
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy">© 2017 <a href="#">Theme Vessel.</a> Trademarks and brands are the property of their respective owners.</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Footer end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

<script src="{{asset('real-house/js/jquery-2.2.0.min.js')}}"></script>
<script src="{{asset('real-house/js/popper.min.js')}}"></script>
<script src="{{asset('real-house/js/bootstrap.min.js')}}"></script>
<script  src="{{asset('real-house/js/bootstrap-submenu.js')}}"></script>
<script  src="{{asset('real-house/js/rangeslider.js')}}"></script>
<script  src="{{asset('real-house/js/jquery.mb.YTPlayer.js')}}"></script>
<script  src="{{asset('real-house/js/wow.min.js')}}"></script>
<script  src="{{asset('real-house/js/bootstrap-select.min.js')}}"></script>
<script  src="{{asset('real-house/js/jquery.easing.1.3.js')}}"></script>
<script  src="{{asset('real-house/js/jquery.scrollUp.js')}}"></script>
<script  src="{{asset('real-house/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script  src="{{asset('real-house/js/leaflet.js')}}"></script>
<script  src="{{asset('real-house/js/leaflet-providers.js')}}"></script>
<script  src="{{asset('real-house/js/leaflet.markercluster.js')}}"></script>
<script  src="{{asset('real-house/js/dropzone.js')}}"></script>
<script  src="{{asset('real-house/js/slick.min.js')}}"></script>
<script  src="{{asset('real-house/js/jquery.filterizr.js')}}"></script>
<script  src="{{asset('real-house/js/jquery.magnific-popup.min.js')}}"></script>
<script  src="{{asset('real-house/js/jquery.countdown.js')}}"></script>
<script  src="{{asset('real-house/js/maps.js')}}"></script>
<script  src="{{asset('real-house/js/app.js')}}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{-- <script  src="{{asset('real-house/js/ie10-viewport-bug-workaround.js')}}"></script>
<!-- Custom javascript -->
<script  src="{{asset('real-house/js/ie10-viewport-bug-workaround.js')}}"></script> --}}
{{-- <script>
     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
             m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
     })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
     ga('create', 'UA-89110077-3', 'auto');
     ga('send', 'pageview');
  </script> --}}

</body>
</html>
