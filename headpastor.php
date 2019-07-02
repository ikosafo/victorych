<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Overseer</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <div class="clearfix"></div>

    <!-- content begin -->
    <section id="section-text-2" class="no-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-7 wow fadeInLeft" data-wow-delay=".5s">
                    <h1>//Name of Overseer</h1>
                    <?php

                    $getoverseer = $mysqli->query("select * from overseer LIMIT 1");
                    $resoverseer = $getoverseer->fetch_assoc();

                    echo $resoverseer['message']

                    ?>

                    <p class="wow fadeIn" data-wow-delay='1.5s'>
                        <img src="assets/img/misc/pic-5.png" alt="">
                    </p>

                </div>

                <div class="col-md-5 wow fadeInUp">
                    <img src="assets/img/misc/pic-4.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </section>


    <!-- section begin -->
<?php include('includes/blog.php'); ?>
    <!-- section close -->


    <!-- content close -->


<?php include('includes/bottom.php'); ?>