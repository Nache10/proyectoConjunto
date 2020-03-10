<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> SEOGO </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head()?>
</head>

<body>
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                    <img src="<?php echo get_template_directory_uri().'/../../../public/img/logo.png'?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#features">Features</a></li>
                                        <li><a href="#statistics">Access Points</a></li>
                                        <li><a href="#APoints">Faq</a></li>
                                        <?php if( Auth::check() && Auth::user()->email === 'nacho@admin.com'){ ?>
                                            <li><a href="/wordpressconjunto/admin">Admin Area</a></li>
                                        <?php
                                        }    
                                        ?>
                                        <?php echo do_shortcode('[gtranslate]'); ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <?php if(!Auth::check()){?> 
                                <div class="book_btn d-none d-lg-block">
                                    <a href="#" data-toggle="modal" data-target="#loginModal">Log In</a>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a  href="#" data-toggle="modal" data-target="#registerModal">Register</a>
                                </div>
                                <?php } else {?>
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="#" data-toggle="modal" data-target="#changepass"> <?php echo Auth::user()->name ?></a>
                                    </div>
                                    <div class="book_btn d-none d-lg-block">
                                        <a  href="logout"> Logout</a>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->