<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>CMS | Home</title>

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

    <style>
        @media screen and (max-width: 768px) {
            .responsive-div {
                top: 0px; /* Adjust this value for smaller screens */
            }
        }

        @media screen and (min-width: 769px) and (max-width: 1024px) {
            .responsive-div {
                top: -50px; /* Adjust this value for medium-sized screens */
            }
        }

        @media screen and (min-width: 1025px) {
            .responsive-div {
                top: -100px; /* Default value for larger screens */
            }
        }
    </style>

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
                                <b>LittleLife: Children Nutrition Monitoring System</b> <b></b>
                            </h1>
                            <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Nutrition workers in the community can use this system to record, 
                                evaluate, and summarize results from the OPT Plus, an annual assessment of children's nutritional status conducted in barangays nationwide from 0 to 59 months of age.
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
        <div style="display: flex; align-items: center; padding: 10px; background-color: #f0f0f0; border-radius: 5px;" class="responsive-div">
            <img src="{{ asset('landing_page_assets/images/cms-logo-header.png') }}" style="width: 100px; height: auto; margin-left: 5%; margin-right: 20px;">
            <p style="margin: 0; padding: 5px; color: black; border-radius: 5px; font-size: 1em; @media (max-width: 768px) { font-size: 0.8em; }">PAMPLONA TRES, LAS PINAS CITY</p>
        </div>
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="about-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6 class="welcome">WELCOME</h6>
                        <h3 class="title"><span>Nutrition workers</span> equipped with a powerful tool 
                        that makes monitoring children's health faster, easier, and more insightful.</h3>
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

    {{-- ACTIVITIES --}}
    <section id="feeding_program_section" class="contact-area pt-120 pb-120">
        <div class="event-container">
            <div class="col-lg-12">
                <div class="feeding-program-container">
                    <h2 style="" class="text-center section-title">Activities</h2>
                    <div id="feedingProgramContainer" style='display:flex; flex-wrap:wrap'>
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
                                <h5 class="title">Little Life</h5>
                            </div>
                            <p class="text" style="color: gray;">Nutrition workers in the community can use this system to record, evaluate, 
                                and summarize results from the OPT Plus, an annual assessment of children's nutritional status conducted in 
                                barangays nationwide from 0 to 59 months of age.</p>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-4 col-sm-6 order-sm-3 order-lg-2">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">Services</h5>
                            </div>
                            <ul>
                                <li><a href="#">Automatic Calculation of Child Growth Standard focusing on height for age, weight for age, and weight for length/height.</a></li>
                                <li><a href="#">Instant Growth Charts</a></li>
                                <li><a href="#">Identify Trends and Patterns</a></li>
                                <li><a href="#"></a>Monthly Monitoring</li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-4 col-sm-6 order-sm-4 order-lg-3">
                        <div class="footer-about pt-40">
                            <div class="footer-title">
                                <h5 class="title">About Us</h5>
                            </div>
                            <p class="text" style="color: gray;">We are a group of students from the Technological University of 
                            the Philippines - Manila, driven by a common goal: to improve the lives of children in our barangay 
                            Through our capstone project, we've poured our hearts and minds into creating the LittleLife. </p>
                        </div> <!-- footer about -->
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

            // Function to fetch and display images for a specific activity
          // Function to fetch and display images for a specific activity
            function fetchAndDisplayImages(activityId, containerId) {
                $.ajax({
                    url: '/upload/retrieve_blob.php?activity_id=' + activityId,
                    type: 'GET',
                    dataType: 'json', // Specify the expected data type
                    success: function(data) {
                        console.log("BASE64 IMAGES");

                        // Check if data is null
                        if (data === null) {
                            console.error('Image data is null.');
                            return;
                        }

                        // Clear the container before appending new images
                        var imageContainer = $(containerId).find('.image-container').empty();

                        // Iterate through the images and create img elements
                        for (var i = 0; i < data.length; i++) {
                            console.log("Image " + (i + 1) + ":", data[i]);

                            var imgElement = $('<img>').attr({
                                'src': 'data:image/jpeg;base64,' + data[i],
                                'class': 'img-fluid m-1',
                            });

                            // Append the img element to the specified container
                            imageContainer.append(imgElement);
                        }

                        // Toggle the visibility of the container
                        $(containerId).slideToggle();
                    },
                    error: function(error) {
                        console.error('Error fetching images:', error);
                    }
                });
            }

            function getProgressColor(progress) {
                switch (progress) {
                    case 'Success':
                        return 'green';
                    case 'Postponed':
                        return 'lightcoral';
                    case 'Ongoing':
                        return 'blue';
                    case 'Cancelled':
                        return 'red';
                    default:
                        return 'gray';
                }
            }


            // Call the fetchFeedingProgram function
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
                            html_content += `
                                            <style>
                                                .event-card {
                                                    position: relative;
                                                }
                                                
                                                .left-30 {
                                                    display: flex;
                                                    align-items: flex-start;
                                                }

                                                .date-time {
                                                    margin-right: 10px;
                                                }

                                                .event-card .progress-indicator {
                                                    position: absolute;
                                                    top: 5px;
                                                    right: 5px;
                                                    font-size: 20px;
                                                    padding: 5px;
                                                    border-radius: 5px;
                                                    color: #fff;
                                                    font-weight: bold;
                                                }

                                                .event-info-70 {
                                                    min-width: 500px;
                                                    word-wrap: break-word;
                                                }

                                                .activity-images-container {
                                                    overflow-x: auto;
                                                }

                                                .activity-images-container .image-container {
                                                    display: flex;
                                                    flex-wrap: nowrap;
                                                    justify-content: flex-start;
                                                    align-items: center;
                                                    margin-top: 10px;
                                                }

                                                .activity-images-container .image-container img {
                                                    max-width: 40%;
                                                    height: auto;
                                                    margin-right: 5px;
                                                    border: 1px solid #ddd;
                                                    border-radius: 5px;
                                                }
                                            </style>

                                            <div class="event-card" data-activity-id="${el.id}">
                                            <div class="left-30">
                                                <div class="date-time dt1">
                                                    <p id="date_of_program" class="date">${moment(el.date_of_program).format('ll')}</p>
                                                    <p id="time_of_program" class="time">${moment(el.date_of_program + " " + el.time_of_program).format('LT')}</p>
                                                </div>

                                                <div class="event-info-70">
                                                    <h3 id="title" class="event-name">${el.title}</h3>
                                                    <h4 id="location" class="event-detail">Location: ${el.location}</h4>
                                                    <p id="description" class="event-detail">${el.description}</p>
                                                </div>
                                            </div>

                                                <!-- Progress Indicator -->
                                                <div class="progress-indicator" style="color: ${getProgressColor(el.progress)}">
                                                    ${el.progress}
                                                </div>
                                            </div>

                                            <!-- Container for the images (initially hidden) -->
                                            <div class="activity-images-container" id="eventImagesContainer-${el.id}" style="display: none;">
                                                <div class="image-container"></div>
                                            </div>`;
                        })

                        $('#feedingProgramContainer').html(html_content);

                        // Add click event listener to each event card
                        $('.event-card').on('click', function() {
                            // Get the activity_id from the clicked event card
                            var activityId = $(this).data('activity-id');
                            
                            // Fetch and display images for the clicked event card
                            fetchAndDisplayImages(activityId, `#eventImagesContainer-${activityId}`);
                        });
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
                });
            }

            // Call the fetchFeedingProgram function
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
