<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Events</h1>
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


                <?php

                $getevent = $mysqli->query("select * from events ORDER by eventdate DESC,period DESC");

                while ($resevent = $getevent->fetch_assoc()) { ?>


                    <!-- event item begin -->
                    <div class="col-md-6 event-item">
                        <div class="inner">
                            <div class="left-col">
                                <img src="<?php echo $resevent['imagelocation']; ?>" alt="">
                            </div>
                            <div class="right-col">
                                <span class="date"><?php echo date('d', strtotime($resevent['eventdate'])) ?></span>
                                <span class="month"><?php echo date('F', strtotime($resevent['eventdate'])) ?></span>
                                <span class="time"><?php echo date('h:i a', strtotime($resevent['eventtime'])) ?></span>
                            </div>
                        </div>
                        <div class="desc">
                            <a href="#">
                                <h3><?php echo $resevent['eventname']; ?></h3>
                            </a>
                            <span class="text">
                   <?php echo $resevent['eventdescription']; ?>
               </span>
                        </div>
                    </div>
                    <!-- event item close -->


                <?php } ?>


            </div>
        </div>
    </section>


    <!-- section begin -->
<?php include('includes/blog.php'); ?>
    <!-- section close -->


    <!-- content close -->


<?php include('includes/bottom.php'); ?>