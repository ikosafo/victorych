<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>About VIC</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <div class="clearfix"></div>

    <!-- section begin -->
    <section id="section-text">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center wow fadeInUp">
                    <h2>About The Church</h2>
                    <div class="divider-double"></div>
                </div>

                <?php
                $getabout = $mysqli->query("select * from about LIMIT 1");
                $resabout = $getabout->fetch_assoc();


                ?>

                <div class="col-md-4 wow fadeInRight" data-wow-delay=".5s">
                    <img src="assets/img/misc/pic-1.jpg" class="img-responsive" alt="">
                    <h3>Our Mission Statement</h3>
                   <?php echo $resabout['mission_statement']; ?>

                    <br>
                    <br>
                    <a href="#" class="st-btn">Read More</a>
                </div>
                <div class="col-md-4 wow fadeInRight" data-wow-delay=".75s">
                    <img src="assets/img/misc/pic-2.jpg" class="img-responsive" alt="">
                    <h3>Vision and Mission</h3>
                    <?php echo $resabout['vision']; ?>
                    <br/>
                    <?php echo $resabout['mission']; ?>
                    <br>
                    <br>
                    <a href="#" class="st-btn">Read More</a>
                </div>
                <div class="col-md-4 wow fadeInRight" data-wow-delay="1s">
                    <img src="assets/img/misc/pic-3.jpg" class="img-responsive" alt="">
                    <h3>Join Us</h3>
                    //Join us Statement
                    <br>
                    <br>
                    <a href="#" class="st-btn">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->



    <!-- section begin -->
    <?php include ('includes/blog.php')?>
    <!-- section close -->


    <!-- content close -->


<?php include('includes/bottom.php'); ?>