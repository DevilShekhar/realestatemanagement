<!DOCTYPE html>
<html lang="en">


<!-- index 06:41:43 GMT -->
<head>
    <meta charset="UTF-8">

    <title>Home | Real Estate Management System</title>

    <!-- Responsive Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Master Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style-new.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/frontend/css/custome-new.css') }}">
    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <!-- Favicon -->
    <link  rel="apple-touch-icon"  sizes="180x180"  href="{{ asset('assets/img/favicon.png') }}" >
    <link rel="icon"  type="image/png"  sizes="32x32" href="{{ asset('assets/img/favicon.png') }}" >
    <link  rel="icon"  type="image/png" sizes="16x16"   href="{{ asset('assets/img/favicon.png') }}" >
</head>
<body>
    <div class="boxed_wrapper">       
        <!--Start Main Header-->
        <header class="main-header header-style2 stricky">
            <div class="inner-container clearfix">
                <div class="logo-box-style2 float-left">
                    <a href="{{ route('frontend.home') }}">
                        <img src="{{ asset('assets/frontend/images/logo-1.png') }}" alt="Awesome Logo"  style="height: 51px;">
                    </a>
                </div>
                <div class="main-menu-box float-right">
                    <nav class="main-menu style2 clearfix">
                        <div class="navbar-header clearfix">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="{{ request()->routeIs('frontend.home') ? 'current' : '' }}"> <a href="{{ route('frontend.home') }}">Home</a>  </li>
                                <li class="{{ request()->routeIs('frontend.about') ? 'current' : '' }}"> <a href="{{ route('frontend.about') }}">About Us</a> </li>
                                <li class="{{ request()->routeIs('frontend.services') ? 'active' : '' }}"><a href="{{ route('frontend.services') }}">Services</a>  </li>                     
                                <li class="{{ request()->routeIs('frontend.contact') ? 'current' : '' }}"><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                    
                </div>
            </div>
        </header>
        <!--End Main Header-->
        <!--End Main Header-->

        <main class="">
            @yield('content')
        </main>
         <!--Start footer area-->
        <footer class="footer-area">
            <div class="footer-shape-bg wow slideInRight" data-wow-delay="300ms" data-wow-duration="2500ms"></div>
            <div class="container">
                <div class="row">
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="contact-info-box">
                                <div class="footer-logo">
                                    <a href="index-2.html">
                                        <img src="{{ asset('assets/frontend/images/logo-1.png') }}" alt="Awesome Logo">
                                    </a>
                                </div>
                                <ul>
                                    <li>
                                        <h6>Address</h6>
                                        <p>Flat 20, Reynolds Neck, North<br> Helenaville, FV77 8WS</p>
                                    </li>
                                    <li>
                                        <h6>Phone</h6>
                                        <p>+324 123 45 978 & 01<br> <span>Mon - Friday:</span> 9.00am to 6.00pm</p>
                                    </li>
                                    <li>
                                        <h6>Email</h6>
                                        <p>abc@yourdomain.com<br> crystalocareer@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="title">
                                <h3>Quick Links</h3>
                            </div>
                            <div class="services-links">
                                <ul>
                                    <li>
                                        <a href="{{ route('frontend.home') }}">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.about') }}">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.contact') }}">
                                            Contact Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.privacy') }}">
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.terms') }}">
                                            Terms & Conditions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.disclaimer') }}">
                                            Disclaimer
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget pdbtm50">
                            <div class="title">
                                <h3>Recent News</h3>
                            </div>
                            <ul class="recent-news">
                                <li>
                                    <div class="img-holder">
                                        <img src="{{ asset('assets/frontend/images/footer/recent-news-1.jpg') }}" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="project-single.html"><span class="icon-next"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <p>March 10, 2019</p>
                                        <h5><a href="#">Creating drama and<br> feeling with...</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="{{ asset('assets/frontend/images/footer/recent-news-2.jpg') }}" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="project-single.html"><span class="icon-next"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <p>March 02, 2019</p>
                                        <h5><a href="#">Wondering if interior<br> design is dying...</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="{{ asset('assets/frontend/images/footer/recent-news-3.jpg') }}" alt="Awesome Image">
                                        <div class="overlay-style-one">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="project-single.html"><span class="icon-next"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <p>February 27, 2019</p>
                                        <h5><a href="#">Enjoy monsoon in<br> comfort of your...</a></h5>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget">
                            <div class="brochures-carousel-box owl-carousel owl-theme">
                                <!--Start Single Item-->
                                <div class="single-item">
                                    <div class="img-holder">
                                       <img src="{{ asset('assets/frontend/images/footer/brochures-1.jpg') }}" alt="Awesome Image">
                                    </div>
                                    <div class="title-holder">
                                        <h3>Our Interior Design<br> Brochure</h3>
                                        <a class="btn-two" href="#">Download Now<span class="flaticon-next"></span></a>
                                    </div>
                                </div>
                                <!--End Single Item-->
                                <!--Start Single Item-->
                                <div class="single-item">
                                    <div class="img-holder">
                                        <img src="{{ asset('assets/frontend/images/footer/brochures-1.jpg') }}" alt="Awesome Image">
                                    </div>
                                    <div class="title-holder">
                                        <h3>Our Interior Design<br> Brochure</h3>
                                        <a class="btn-two" href="#">Download Now<span class="flaticon-next"></span></a>
                                    </div>
                                </div>
                                <!--End Single Item-->
                                <!--Start Single Item-->
                                <div class="single-item">
                                    <div class="img-holder">
                                        <img src="{{ asset('assets/frontend/images/footer/brochures-1.jpg') }}" alt="Awesome Image">
                                    </div>
                                    <div class="title-holder">
                                        <h3>Our Interior Design<br> Brochure</h3>
                                        <a class="btn-two" href="#">Download Now<span class="flaticon-next"></span></a>
                                    </div>
                                </div>
                                <!--End Single Item-->
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                </div>
            </div>
        </footer>
        <!--End footer area-->

        <!--Start footer bottom area-->
        <section class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="footer-bottom-content flex-box-two">
                           <div class="copyright-text">
                                <p>
                                    © 2026 PropertyHub. All Rights Reserved.
                                    <span class="copyright-separator">|</span>
                                    Developed &amp; Marketed by
                                    <a href="https://eternalhightech.com/" target="_blank" rel="noopener noreferrer">
                                        Eternal HighTech
                                    </a>
                                </p>
                            </div>
                            <div class="footer-social-links float-right">
                                <span>We are On:</span>
                                <ul class="sociallinks-style-one">
                                    <li class="wow slideInUp" data-wow-delay="0ms" data-wow-duration="1200ms">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="wow slideInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="wow slideInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="wow slideInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->
    </div>
    

    <div class="scroll-to-top-style2 scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>



    <!-- Core JavaScript -->
<script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/appear.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.enllax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.paroller.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.js') }}"></script>
<script src="{{ asset('assets/frontend/js/validation.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.js') }}"></script>
 

<!-- Map Helper -->
<script src="{{ asset('assets/frontend/js/map-helper.js') }}"></script>

<!-- Additional Assets -->
<script src="{{ asset('assets/frontend/assets/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/timepicker/timePicker.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/html5lightbox/html5lightbox.js') }}"></script>

<!-- Revolution Slider -->
<script src="{{ asset('assets/frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>

<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

<!-- Main Slider -->
<script src="{{ asset('assets/frontend/js/main-slider-script.js') }}"></script>

<!-- Custom Script -->
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

</body>
</html>
