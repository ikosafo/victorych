<?php include ('includes/header.php');

//include ('config.php');

?>
    <!-- slider -->
    <div id="slider">
        <!-- revolution slider begin -->
        <div class="fullwidthbanner-container">
            <div id="revolution-slider">
                <ul>
<?php
                    $getslider = $mysqli->query("select * from homeslider ORDER by period");

                        while ($resslider = $getslider->fetch_assoc()) {

    ?>

                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">
                        <!--  BACKGROUND IMAGE -->
                        <img src="<?php echo $resslider['imagelocation'] ?>" alt="">
                        <div class="tp-caption border-v lft"
                             data-x="540"
                             data-y="center"
                             data-speed="800"
                             data-start="400"
                             data-easing="easeInOutCubic"
                             data-endspeed="300">
                        </div>

                        <div class="tp-caption custom-font-1 lft"
                             data-x="600"
                             data-y="140"
                             data-speed="800"
                             data-start="1000"
                             data-easing="easeInOutCubic"
                             data-endspeed="300">
                            <?php echo $resslider['text1'] ?>
                        </div>

                        <div class="tp-caption lft custom-font-2"
                             data-x="600"
                             data-y="190"
                             data-speed="800"
                             data-start="800"
                             data-easing="easeInOutCubic">
                            <?php echo $resslider['text2'] ?>
                        </div>

                        <div class="tp-caption tp-text sfb text-left"
                             data-x="600"
                             data-y="240"
                             data-speed="800"
                             data-start="1400"
                             data-easing="easeInOutCubic">

                            <?php
                            echo wordwrap($resslider['description'], 80, '<br>') . '<br>';

                            ?>

                        </div>

                        <div class="tp-caption sfb text-left"
                             data-x="600"
                             data-y="320"
                             data-speed="800"
                             data-start="1600"
                             data-easing="easeInOutCubic">
                            <a class="btn btn-slider" href="#">Read More</a>
                        </div>
                    </li>

<?php } ?>

                </ul>
            </div>
        </div>
        <!-- revolution slider close -->
    </div>
    <!-- slider close -->

    <div class="clearfix"></div>

    <!-- content begin -->
    <div id="content" class="no-padding">

        <!-- section begin -->
        <section id="page-events" class="no-padding">
            <div class="fullwidth">
                <div class="one-fourth text-center">
                    <div class="title-area wow slideInLeft">
                        <span>Upcoming</span>
                        <h1>Events</h1>
                    </div>
                </div>

                <div class="three-fourth">
                    <div class="fx custom-carousel-1">
                        <div class="item">
                            <div class="overlay">
                                <span class="time">February 6, 2017</span>
                                <a href="assets/#">
                                    <h3>Family Baptism Class</h3>
                                </a>
                                <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </span>
                            </div>
                            <img src="assets/img/events/pic%20(1).jpg" alt="">
                        </div>

                        <div class="item">
                            <div class="overlay">
                                <span class="time">February 10, 2017</span>
                                <a href="assets/#">
                                    <h3>Transforming Live</h3>
                                </a>
                                <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </span>
                            </div>
                            <img src="assets/img/events/pic%20(2).jpg" alt="">
                        </div>

                        <div class="item">
                            <div class="overlay">
                                <span class="time">February 20, 2017</span>
                                <a href="assets/#">
                                    <h3>Relationship With God</h3>
                                </a>
                                <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </span>
                            </div>
                            <img src="assets/img/events/pic%20(3).jpg" alt="">
                        </div>

                        <div class="item">
                            <div class="overlay">
                                <span class="time">February 26, 2017</span>
                                <a href="assets/#">
                                    <h3>Abundant Life</h3>
                                </a>
                                <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </span>
                            </div>
                            <img src="assets/img/events/pic%20(4).jpg" alt="">
                        </div>

                        <div class="item">
                            <div class="overlay">
                                <span class="time">March 1, 2017</span>
                                <a href="assets/#">
                                    <h3>God is Good</h3>
                                </a>
                                <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </span>
                            </div>
                            <img src="assets/img/events/pic%20(5).jpg" alt="">
                        </div>

                        <div class="item">
                            <div class="overlay">
                                <span class="time">March 10, 2017</span>
                                <a href="assets/#">
                                    <h3>Jehovah Jireh</h3>
                                </a>
                                <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </span>
                            </div>
                            <img src="assets/img/events/pic%20(6).jpg" alt="">
                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="countdown-container" data-speed="5" data-type="background">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6 wow fadeInLeft">
                        <h3>Transforming Live, Restoring Hope</h3>
                        <span class="time">April 10, 2017 8:00 pm</span>
                    </div>

                    <div class="col-md-6 wow fadeInRight" data-wow-delay=".25s">
                        <div id="defaultCountdown"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->


        <!-- section begin -->
        <section id="section-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="testi-carousel" class="testi-slider text-center wow fadeInUp">
                            <div class="item">
                                <img src="assets/img/testi/pic%20(1).jpg" alt="" class="img-circle">
                                <blockquote>Blessing theme has a real desire and heart for ministry within the local church</blockquote>
                                <span class="testi-by">Aline Drummond</span>
                            </div>
                            <div class="item">
                                <img src="assets/img/testi/pic%20(2).jpg" alt="" class="img-circle">
                                <blockquote>I Just wanted to let you know how pleased we are and how great the Blessing theme is working for our National Church </blockquote>
                                <span class="testi-by">Mortimer Elmo</span>
                            </div>
                            <div class="item">
                                <img src="assets/img/testi/pic%20(3).jpg" alt="" class="img-circle">
                                <blockquote>
                                    Get in touch with Blessing theme today and get ready to see your church grow!

                                </blockquote>
                                <span class="testi-by">Marina Leopold</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

    </div>
    <!-- footer begin -->

<?php include ('includes/bottom.php'); ?>