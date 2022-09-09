<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app_name', 'Yo ! Libe') }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <!--  Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!--  FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- JQUERY -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- MAIN TEMPLATE -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <!--  MAIN.JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</head>

<body>
    <div id="preloader"></div>

    <div class="content">
        @yield('content')
    </div>

    <footer class="mainfooter" role="contentinfo">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <!--Column1-->
                        <div class="footer-pad">
                            <ul class="list-unstyled">
                                <li>
                                    developed@jaswinder
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h5>Policies</h5>
                            <ul class="list-unstyled">
                                <li><a href="javascript:void(0)">Terms of Use</a></li>
                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h5>GET IN TOUCH </h5>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    +91 84378 38075

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <h5>Follow Us</h5>
                        <ul class="social-network social-circle">
                            <li><a href="https://www.facebook.com/profile.php?id=100010367022914" class="icoFacebook"
                                    title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/in/jaswinder-singh-32a875192" class="icoLinkedin"
                                    title="Linkedin"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/jaswinder_ghs/" class="icoLinkedin"
                                    title="Linkedin"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 copy">
                        <p class="text-center">&copy; Copyright 2021 | All rights reserved.</p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

</body>

</html>
