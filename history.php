<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Church History</h1>
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
                <div class="col-md-8 wow fadeInLeft" data-wow-delay=".5s">
                    <h1>History</h1>


                    <?php

             $gethistory = $mysqli->query("select * from history LIMIT 1");
             $reshistory = $gethistory->fetch_assoc();

             echo $reshistory['message']

                    ?>


                </div>

                <div class="col-md-4 wow fadeInUp">
                    <img src="assets/img/misc/pic-4.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </section>



    <!-- section begin -->
    <?php include ('includes/blog.php'); ?>
    <!-- section close -->


    <!-- content close -->





<?php include('includes/bottom.php'); ?>