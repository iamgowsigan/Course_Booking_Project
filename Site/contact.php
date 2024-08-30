<?php
session_start();
//session_destroy();
include 'includes/config.php';
error_reporting(0);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include 'includes/head.php'; ?>

</head>

<body>

    <div class="main-wrapper">
        <?php include 'includes/navigation.php'; ?>
        <!-- CONTENT START-->

        <?php include 'layout/contact-banner.php'; ?>

        <!-- Page Section Start -->
        <div class="page-section section section-padding">
            <div class="container">
                <div class="row row-30 mbn-40">

                    <div class="contact-info-wrap col-md-6 col-12 mb-40">
                        <h3>Get in Touch</h3>
                        <p>Welcome to The ToddleBee, your number one source for organic baby products. We're dedicated
                            to providing you the very best of organic and baby-friendly products, with an emphasis on
                            Quality and Eco-Friendliness.

                            Founded in 2019 by Priya, The ToddleBee has come a long way from its beginnings in Trichy.
                            When Priya first started out, her passion for Organic Baby products drove them to start
                            their own business.

                            We hope you enjoy our products as much as we enjoy offering them to you. If you have any
                            questions or comments, please don't hesitate to contact us.</p>
                        <ul class="contact-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <p>256, 1st AVE, You address <br>will be here</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p><a href="#">+01 235 567 89</a><a href="#">+01 235 286 65</a></p>
                            </li>
                            <li>
                                <i class="fa fa-globe"></i>
                                <p><a href="#">info@example.com</a><a href="#">www.example.com</a></p>
                            </li>
                        </ul>
                    </div>

                    <div class="contact-form-wrap col-md-6 col-12 mb-40">
                        <h3>Leave a Message</h3>
                        <form id="contact-form"
                            action="https://demo.hasthemes.com/jadusona-preview/jadusona/assets/php/mail.php">
                            <div class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-30"><input type="text" name="name"
                                            placeholder="Your Name"></div>
                                    <div class="col-lg-6 col-12 mb-30"><input type="email" name="email"
                                            placeholder="Email Address"></div>
                                    <div class="col-12 mb-30"><textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12"><input type="submit" value="send"></div>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>

                </div>
            </div>
        </div><!-- Page Section End -->

        <?php include 'layout/home-promise.php'; ?>




        <!-- CONTENT END-->
        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/toast.php'; ?>

    </div>
    <?php include 'includes/script.php'; ?>
</body>

</html>