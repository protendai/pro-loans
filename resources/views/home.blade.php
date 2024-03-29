<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>V-Finance | Home</title>

    <link rel="shortcut icon" href="{{ asset('site/img/favicon_home.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('site/img/favicon_home.ico')}}" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('site/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('site/assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site/assets/simple-line-icons/css/simple-line-icons.css')}}">

    <!-- Preloader CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/preloader.css')}}">

    <!-- Custom CSS -->
    <link href="{{ asset('site/css/custom.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('site/css/responsive.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <!-- Preloader -->
    <div id="preloader"> 
        <div id="wave"></div>
    </div>
    <div id="mask"></div>
    <!-- End Of Preloader -->

    <!-- NavBar -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand Logo -->
            <div class="navbar-header">
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="{{ asset('site/img/logo_home.png')}}" alt="LOGO" style="max-width: 180px;">
                </a>
            </div>

            <!-- Contact Number -->
            <div class="social_link">
                <ul class="nav navbar-nav navbar-right call_to">
                    <li>
                        <a class="#" href="tel:+0000000000"><i class="icon-phone"></i> 263 712 980 123</a>
                    </li>
                    <li>
                        <a class="#" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Of Nav Bar -->

    <!-- Header -->
    <header id="page_top" class="home_loan">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Instant Approval For Home Loan</h1>
                            <p>Lowest Interest Rates - Check Eligibility - Instant e-Approval </p>
                            <h2>10% <span>For New Customers</span></h2>
                            <h2>5% <span>For Old Customers</span></h2>
                            <a href="#features" class="btn btn-outline btn-xl page-scroll">Why Choose Us ?</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-container">
                        <div class="form-mockup">
                            <h2 style="color:red !important">Request A Loan Now</h2>
                            <h4>Easy to apply for a loan with us,Once you have complete this form. </h4>
                            <form method="POST" action="{{ route('customer.register') }}">
                                @csrf
                              <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Name" pattern="[a-zA-Z].{3,25}" maxlength="15" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="surname" class="form-control" placeholder="Surname" pattern="[a-zA-Z].{3,25}" maxlength="15" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-mail" maxlength="25" required>
                              </div>
                              <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone" pattern="[0]{1}[7]{1}[1-7]{1}[1-9]{1}[0-9]{6}"  maxlength="12" required>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                    <select id="country" name ="country" class="form-control" style="display:none"></select>
                                    <select name ="province" id ="state"  class="form-control" required></select>
                                  </div>
    
                                  <div class="form-group col-md-6">
                                    <select name ="district" id ="district"  class="form-control" required></select>
                                  </div>
                              </div>

                              <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Address" pattern="[a-zA-Z0-9].{10,50}" maxlength="50">
                              </div>

                              <div class="form-group">
                                <input type="number" name="duration" class="form-control" placeholder="How long you want to borrow for ?">
                              </div>
                              
                              <div class="form-group">
                                <div class="button-slider">
                                  <div class="btn-group btn_group">
                                    <div class="btn btn-default btn_amount">Amount </div>
                                    <div class="btn btn-default btn_slider">
                                      <input id="bootstrap-slider" type="text" name="amount" data-slider-min="1" data-slider-max="5000" data-slider-step="1" data-slider-value="100"/>
                                      <div class="valueLabel"><span class="text_span">Amount &nbsp; &nbsp;</span> $<span id="sliderValue">100</span></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <button type="submit" class="btn btn-default quote_btn">Send Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Of Header -->
    @include('includes.alerts')
    @include('sweetalert::alert')
    <!-- Section Features -->
    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Reason to Choose Us</h2>
                        <p class="text-muted">Bad credit is worse than a bad swing but at Cardomain.com your credit is good with us. Easy to apply for a loan with us, Once you have complete this form.  </p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <img src="{{ asset('site/img/demo-screen.jpg')}}" class="img-responsive" alt=""> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-check"></i>
                                    <h3>Easy Loan Approvals</h3>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam gravida erat sit amet nunc iaculis mattis. Vivamus aliquam, eros sed tempor lacinia, ante metus sodales libero in.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-clock"></i>
                                    <h3>Fast and FREE</h3>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam gravida erat sit amet nunc iaculis mattis. Vivamus aliquam, eros sed tempor lacinia, ante metus sodales libero in.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-user-follow"></i>
                                    <h3>Hassle free</h3>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam gravida erat sit amet nunc iaculis mattis. Vivamus aliquam, eros sed tempor lacinia, ante metus sodales libero in.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item last-one">
                                    <i class="icon-lock"></i>
                                    <h3>100% Safe and Secure</h3>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam gravida erat sit amet nunc iaculis mattis. Vivamus aliquam, eros sed tempor lacinia, ante metus sodales libero in.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Section Features -->

    <!-- Section About And Counter -->
    <section id="about" class="about text-center" style="background:#fff">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="section-heading">Home Loans - Bad Credit, Good Credit, or No Credit!</h2>
                    <p class="about_p">Getting a Home loan with bad credit has never been easier! At EasyLoan, we want to help you get into the Home you deserve.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="main_counter_content text-center white-text wow fadeInUp">
                    <div class="col-md-3 col-sm-6">
                        <div class="single_counter">
                            <p class="counter_icon"><i class="icon-people"></i></p>
                            <span class="counter">500</span>K
                            <p>Satisfied Clients</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_counter">
                            <p class="counter_icon"><i class="fa fa-usd" aria-hidden="true"></i></p>
                            <span class="counter">550</span>K
                            <p>Home Loan</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_counter">
                            <p class="counter_icon"><i class="icon-user-following"></i></p>
                            <span class="counter">150</span>K
                            <p>Repeat Client</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_counter">
                            <p class="counter_icon"><i class="icon-check"></i></p>
                            <span class="counter">100</span>%
                            <p>Safe & Secure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Of About And Counter -->

    <!-- Section Agents -->
    <section id="agents" class="agents text-center">
        <div class="agents_contain">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="section-heading">Meet Our Agents</h2>
                        <p class="aagents_p">Meet Our Best Agents. Our team of agents are ready to help you.</p>
                        <hr>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="carousel slide media-carousel" id="media">
                            <div class="carousel-inner">
                                <div class="item  active">
                                    <div class="row">
                                        <div class="col-md-4 padtop30">
                                            <div class="parent_circle">
                                                <div class="parent_circle_contain">
                                                    <p>Brain Adams </p>
                                                    <p>Developer PROFILE</p>
                                                    <a href="#">Know More...</a>
                                                </div>
                                                <div class=" child_round_circle child_round_circle_img1"></div>
                                            </div>
                                        </div>          
                                        <div class="col-md-4 padtop30">
                                            <div class="parent_circle">
                                                <div class="parent_circle_contain">
                                                    <p>Jhon Khan</p>
                                                    <p>DESIGNER PROFILE</p>
                                                    <a href="#">Know More...</a>
                                                </div>
                                                <div class="child_round_circle child_round_circle_img2"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padtop30">
                                            <div class="parent_circle">
                                                <div class="parent_circle_contain">
                                                    <p>Jessica biel</p>
                                                    <p>DESIGNER PROFILE</p>
                                                    <a href="#">Know More...</a>
                                                </div>
                                                <div class=" child_round_circle child_round_circle_img3 "></div>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-4 padtop30">
                                            <div class="parent_circle">
                                                <div class="parent_circle_contain">
                                                    <p>Brain Adams </p>
                                                    <p>Developer PROFILE</p>
                                                    <a href="#">Know More...</a>
                                                </div>
                                                <div class=" child_round_circle child_round_circle_img1"></div>
                                            </div>
                                        </div>          
                                        <div class="col-md-4 padtop30">
                                            <div class="parent_circle">
                                                <div class="parent_circle_contain">
                                                    <p>Jhon Khan</p>
                                                    <p>DESIGNER PROFILE</p>
                                                    <a href="#">Know More...</a>
                                                </div>
                                                <div class="child_round_circle child_round_circle_img2"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 padtop30">
                                            <div class="parent_circle">
                                                <div class="parent_circle_contain">
                                                    <p>Jessica biel</p>
                                                    <p>DESIGNER PROFILE</p>
                                                    <a href="#">Know More...</a>
                                                </div>
                                                <div class=" child_round_circle child_round_circle_img3 "></div>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                            <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                            <a data-slide="next" href="#media" class="right carousel-control">›</a>
                        </div>                          
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Agents -->

    <!-- Section Testimonials -->
    <section id="testimonials" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title text-center">Reviews</h2>
                    <p class="testimonials_p">What our clients say about us.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="testimonials-list">
                    
                         <!-- Single Testimonial -->  
                        <div class="single-testimonial">
                            <div class="testimonial-holder">
                                <div class="testimonial-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia
                                    <div class="testimonial-caret"><i class="fa fa-caret-down"></i></div>
                                </div>
                                <div class="row">
                                    <div class="testimonial-user clearfix">
                                        <div class="testimonial-user-image"><img src="img/t3.jpg" alt=""></div>
                                        <div class="testimonial-user-name">Dev Krishna <br><a href="#">Roswell, GA</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Testimonial -->  
                        
                        <!-- Single Testimonial -->  
                        <div class="single-testimonial">
                            <div class="testimonial-holder">
                                <div class="testimonial-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia
                                    <div class="testimonial-caret"><i class="fa fa-caret-down"></i></div>
                                </div>
                                <div class="row">
                                    <div class="testimonial-user clearfix">
                                        <div class="testimonial-user-image"><img src="img/t2.jpg" alt=""></div>
                                        <div class="testimonial-user-name">Donny J. Griffin <br><a href="#">Brooklyn, NYC</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- End of Single Testimonial -->  
                         
                        <!-- Single Testimonial -->  
                        <div class="single-testimonial">
                            <div class="testimonial-holder">
                                <div class="testimonial-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia
                                    <div class="testimonial-caret"><i class="fa fa-caret-down"></i></div>
                                </div>
                                <div class="row">
                                    <div class="testimonial-user clearfix">
                                        <div class="testimonial-user-image"><img src="img/t3.jpg" alt=""></div>
                                        <div class="testimonial-user-name">Ryder Lothian <br><a href="#">Atlanta, GA</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Testimonial -->  
                        
                        <!-- Single Testimonial -->  
                        <div class="single-testimonial">
                            <div class="testimonial-holder">
                                <div class="testimonial-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia
                                    <div class="testimonial-caret"><i class="fa fa-caret-down"></i></div>
                                </div>
                                <div class="row">
                                    <div class="testimonial-user clearfix">
                                        <div class="testimonial-user-image"><img src="img/t1.jpg" alt=""></div>
                                        <div class="testimonial-user-name">Bruce Wayne<br><a href="#">Austin, TX</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Testimonial -->  
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Section Testimonials -->

    <!-- Section FAQ -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <i class="icon-question faq_icon"></i>
                    <h2 class="faq_title">Ask about our low rate car loans?</h2>
                    <p>Porttitor acese its commodo non lorem estibulum finibus urna eu efficitur non lorem acese its do remmselorem ipusm dolro sit commodo.</p>
                    <a class="btn btn-primary page-scroll" href="#contact">Ask Question</a>
                </div>
                <div class="col-md-7 mar-20t">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Lorem ipsum dolor sit?</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur <strong>adipisicing elit</strong>. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia. Adipisci animi consequatur cupiditate. 
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Lorem ipsum dolor sit amet, consectetur adipisicing?</a>
                                </h4>
                            </div>
                            <div id="collapseTen" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia. Adipisci animi consequatur cupiditate. 
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Lorem ipsum dolor sit amet, consectetur?</a>
                                </h4>
                            </div>
                            <div id="collapseEleven" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicingelit. Adipisci animi consequatur cupiditate <strong>delectus dicta dolore dolorem ex harum</strong> ipsum laborum nobis nulla odit officia. Adipisci animi consequatur cupiditate.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Lorem ipsum dolor?</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicingelit. Adipisci animi consequatur cupiditate delectus dicta dolore dolorem ex harum ipsum laborum nobis nulla odit officia. Adipisci animi <strong>consequatur cupiditate</strong>.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Lorem ipsum dolor sit amet?</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicingelit:
                                    <ul>
                                        <li>Adipisci animi consequatur</li>
                                        <li>Adipisci animi consequatur cupiditate</li>
                                        <li>Adipisci animi consequatur cupiditate delectus</li>
                                        <li>Adipisci animi consequatur cupiditate delectus dicta</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Section FAQ -->



    <!-- Section Social And NewsLetter -->
    <section id="Social" class="social_contact" style="background:#F1F1F1">
        <div class="container">
            <div class="row">
                <h2>Stay Connected <i class="fa fa-handshake-o" aria-hidden="true"></i> With Us</h2>
                <div class="tab-content custom-tab-content">
                    <div class="subscribe-panel">
                        <p>Subscribe to our weekly Newsletter and stay tuned.</p>
                        <form action="#" method="post">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control input-lg" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-12">
                                <button class="btn btn-info btn-lg">Subscribe Now!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline list-social">
                    <li class="social-twitter">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="social-facebook">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="social-google-plus">
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Section Social And NewsLetter -->

    <!-- Section Contact -->
    <section id="contact">
        <h2 id="dev-snippet-title" class="text-center">Contact Us</h2>
        <div class="container mr_top_10">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-6">
                    <form action="mailer.php" method="post" >
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="InputPhone" name="InputPhone" placeholder="Enter Phone Number" required  >
                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="InputZipCode" name="InputZipCode" placeholder="Enter Zip Code" required  >
                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" placeholder="Type Message Text" required></textarea>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline btn-xl page-scroll pull-right">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-md-offset-1">
                    <address>
                        <p class="address_icon"><i class="icon-home"></i></p>
                        <p class="lead">Office Location</p>
                        <p class="lead"><i class="icon-location-pin"></i> EasyLoan LLC.<br> Washington, DC 20301.</p>
                        <p class="lead"><i class="icon-screen-smartphone"></i> Phone: 121-000-1234</p>
                        <p class="lead"><i class="icon-paper-plane"></i> Fax: 121-000-9876</p>
                        <p class="lead"><i class="icon-envelope-open"></i> Email: info@yourdomain.com</p>
                    </address>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Section Contact -->

    <!-- Footer -->  
    <footer>
        <div class="container">
            <p>&copy; 2017 EasyLoan. All Rights Reserved.</p>
            <ul class="list-inline">
                <li>
                    <a href="#">Privacy</a>
                </li>
                <li>
                    <a href="#">Terms</a>
                </li>
            </ul>
        </div>
    </footer>
    <!-- End Of Footer -->

    <!-- jQuery -->
    <script src="{{ asset('site/assets/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('site/assets/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('site/js/jquery.easing.js')}}"></script>
    <script src="{{ asset('site/js/jquery.counterup.js')}}"></script>
    <script src="{{ asset('site/js/jquery.waypoints.js')}}"></script>
    <script src="{{ asset('site/js/price.slider.js')}}"></script>
    <script src="{{ asset('js/country.js') }}"></script>

    <!-- Theme JavaScript -->
    <script src="{{ asset('site/js/custom.js')}}"></script>
    <script src="{{ asset('site/js/testimonials.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDgI2pfq_vtH_hOyGMZ7WM2PGcP72VJbYw"></script>

   <script>
        populateCountries("country", "state","district");
	    populateStates("country", "state","district");
   </script>
</body>

</html>
