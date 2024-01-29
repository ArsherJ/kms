<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>KMS | Home</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('landing_page_assets/images/favicon.png') }}" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/slick.css') }}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/font-awesome.min.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/LineIcons.css') }}">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/animate.css') }}">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/magnific-popup.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing_page_assets/css/style.css') }}">

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area headroom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="/">
                                <h2>KMS</h2>
                                {{-- <img src="{{ asset('landing_page_assets/images/logo.png') }}" alt="Logo"> --}}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav m-auto">
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" href="/login">Login</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center"
            style="background-image: url(landing_page_assets/images/header-hero.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-hero-content">
                            <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                <b>KA-In</b> <span>Monitoring</span> System <b></b>
                            </h1>
                            <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">A system that
                                employs a monitoring system to store all data in a database for the purpose of
                                overseeing individuals' information, monitoring their records, and evaluating their
                                health.
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s"
                data-wow-delay="1.1s">
                <div class="image">
                    <img src="{{ asset('landing_page_assets/images/hero-image.png') }}" alt="Hero Image">
                </div>
            </div> <!-- header hero image -->
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="about-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6 class="welcome">WELCOME</h6>
                        <h3 class="title"><span>Discover the convenience of real-time BMI monitoring</span>, empowering
                            you to take control of your health and fitness journey effortlessly.</h3>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-image mt-60 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{ asset('landing_page_assets/images/about.png') }}" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="about-content pt-45">

                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    {{-- ANNOUNCEMENTS --}}
    <section id="announcement_section" class="contact-area pt-120 pb-120">
        <div class="announcement-container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="container">
                        <h2 class="text-center section-title">Announcements</h2>
                        <div id="announcementContainer">

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        </div> <!-- container -->
    </section>


    {{-- FEEDING PROGRAM --}}
    <section id="feeding_program_section" class="contact-area pt-120 pb-120">
        <div class="event-container">
            <div class="col-lg-12">
                <div class="feeding-program-container">
                    <h2 style="" class="text-center section-title">Feeding Programs</h2>
                    <div id="feedingProgramContainer" class="m-4">

                    </div>
                </div>
            </div>
        </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FAQ ======-->

    <section id="faq_section" class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="faq-container">
                        <h2 class="text-center  section-title">Frequently Asked Questions</h2>
                        <div id="faqContainer" class="accordion">

                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            {{-- <div class="contact-info pt-30">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex  wow fadeInUp"
                            data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="contact-info-icon">
                                <i class="lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">21 King Street, Melbourne <br> Victoria, 1202 Australia.</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex  wow fadeInUp"
                            data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="contact-info-icon">
                                <i class="lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">hello@uideck.com</p>
                                <p class="text">support@uideck.com</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex  wow fadeInUp"
                            data-wow-duration="1s" data-wow-delay="0.9s">
                            <div class="contact-info-icon">
                                <i class="lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">+99 000 1111 555</p>
                                <p class="text">+88 999 5555 444</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info --> --}}

        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area bg_cover"
        style="background-image: url(landing_page_assets/images/footer-bg.jpg)">
        <div class="container">
            <div class="footer-widget pt-30 pb-70">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 order-sm-1 order-lg-1">
                        <div class="footer-about pt-40">
                            <div class="footer-title">
                                <h5 class="title">KA-In Monitoring System</h5>
                            </div>
                            <p class="text text-dark">A system that employs a monitoring system to store all data in a database
                                for the purpose of overseeing individuals' information, monitoring their records, and
                                evaluating their health.</p>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-4 col-sm-6 order-sm-3 order-lg-2">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">Services</h5>
                            </div>
                            <ul>
                                <li><a href="#">Individual Records Monitoring</a></li>
                                <li><a href="#">BMI Categorized</a></li>
                                <li><a href="#">Schedule a Program</a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-4 col-sm-6 order-sm-4 order-lg-3">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">About Us</h5>
                            </div>
                            <ul>
                                <li><a href="#">Students</a></li>
                                <li><a href="#">Development Team</a></li>
                                <li><a href="#">Technological University of the Philippines, Manila</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>

                </div> <!-- row -->
            </div>
        </div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->


    <!--====== Jquery js ======-->
    <script src="landing_page_assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="landing_page_assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="landing_page_assets/js/popper.min.js"></script>
    <script src="landing_page_assets/js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="landing_page_assets/js/slick.min.js"></script>

    <!--====== Isotope js ======-->
    <script src="landing_page_assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="landing_page_assets/js/isotope.pkgd.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="landing_page_assets/js/waypoints.min.js"></script>
    <script src="landing_page_assets/js/jquery.counterup.min.js"></script>

    <!--====== Circles js ======-->
    <script src="landing_page_assets/js/circles.min.js"></script>

    <!--====== Appear js ======-->
    <script src="landing_page_assets/js/jquery.appear.min.js"></script>

    <!--====== WOW js ======-->
    <script src="landing_page_assets/js/wow.min.js"></script>

    <!--====== Headroom js ======-->
    <script src="landing_page_assets/js/headroom.min.js"></script>

    <!--====== Jquery Nav js ======-->
    <script src="landing_page_assets/js/jquery.nav.js"></script>

    <!--====== Scroll It js ======-->
    <script src="landing_page_assets/js/scrollIt.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="landing_page_assets/js/jquery.magnific-popup.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
        integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!--====== Main js ======-->
    <script src="landing_page_assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            // GLOBAL VARIABLE
            const APP_URL = "{{ env('APP_URL') }}"
            const API_URL = "{{ env('API_URL') }}"
            const API_TOKEN = localStorage.getItem("API_TOKEN")
            const BASE_API = API_URL + '/faqs'



            function fetchFaq() {
                let form_url = BASE_API;

                $.ajax({
                    url: form_url,
                    method: "GET",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let html_content = ``

                        console.log(data)

                        data.forEach((el) => {
                            html_content += `<div class="accordion-item">
                                <button class="btnView" id="${el.id}" aria-expanded="false"><span
                                        class="accordion-title">Q: ${el.question}</span><span class="icon" aria-hidden="true"></span></button>
                                <div class="accordion-content">
                                    <p>A: ${el.answer}</p>
                                </div>
                            </div>`
                        })

                        $('#faqContainer').html(html_content)
                    },
                    error: function(error) {
                        console.log(error)
                        if (error.responseJSON.errors == null) {
                            swalAlert('warning', error.responseJSON.message)
                        } else {
                            $.each(error.responseJSON.errors, function(key, value) {
                                swalAlert('warning', value)
                            });
                        }
                    }
                    // ajax closing tag
                })
            }

            fetchFaq();

            function fetchAnnouncement() {
                let form_url = API_URL + "/announcements/published";

                $.ajax({
                    url: form_url,
                    method: "GET",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let html_content = ``

                        console.log(data)

                        data.forEach((el) => {
                            html_content += `<div class="card-category-1">
                                                <div class="basic-card basic-card-aqua">
                                                    <div class="card-content">
                                                        <span class="card-title">${el.title}</span>
                                                        <p class="card-text">
                                                            ${el.description}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>`
                        })

                        $('#announcementContainer').html(html_content)
                    },
                    error: function(error) {
                        console.log(error)
                        if (error.responseJSON.errors == null) {
                            swalAlert('warning', error.responseJSON.message)
                        } else {
                            $.each(error.responseJSON.errors, function(key, value) {
                                swalAlert('warning', value)
                            });
                        }
                    }
                    // ajax closing tag
                })
            }

            fetchAnnouncement();

            function fetchFeedingProgram() {
                let form_url = API_URL + "/feeding_programs/published";

                $.ajax({
                    url: form_url,
                    method: "GET",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let html_content = ``

                        console.log(data)

                        data.forEach((el) => {
                            html_content += `<div class="event-card">
                                                    <div class="left">
                                                        <div class="date-time dt1">
                                                            <p id="date_of_program" class="date">${moment(el.date_of_program).format('ll')}</p>
                                                            <p id="time_of_program" class="time">${moment(el.date_of_program + " " + el.time_of_program).format('LT')}</p>
                                                        </div>

                                                        <div class="event-info">
                                                            <h3 id="title" class="event-name">
                                                                ${el.title}
                                                            </h3>
                                                            <h4 id="location" class="event-detail">
                                                                Location: ${el.location}
                                                            </h4>
                                                            <p id="description" class="event-detail">
                                                                ${el.description}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>`
                        })

                        $('#feedingProgramContainer').html(html_content)
                    },
                    error: function(error) {
                        console.log(error)
                        if (error.responseJSON.errors == null) {
                            swalAlert('warning', error.responseJSON.message)
                        } else {
                            $.each(error.responseJSON.errors, function(key, value) {
                                swalAlert('warning', value)
                            });
                        }
                    }
                    // ajax closing tag
                })
            }

            fetchFeedingProgram();


            $(document).on('click', '.btnView', function() {
                if ($(this).attr("aria-expanded") === "true") {
                    $(this).attr("aria-expanded", "false");
                } else {
                    $(this).attr("aria-expanded", "true");
                }
            });


        })
    </script>

</body>

</html>
