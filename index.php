<?php include('includes/header.php');

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


                    <?php $getevent = $mysqli->query("select * from events ORDER BY eventdate DESC");

                    while ($resevent = $getevent->fetch_assoc()) {
                        ?>

                        <div class="item">
                            <div class="overlay">
                                    <span class="time">
                                        <?php echo date('F j, Y', strtotime($resevent['eventdate'])); ?>
                                    </span>
                                <a href="events.php">
                                    <h3>
                                        <?php echo $resevent['eventname']; ?>
                                    </h3>
                                </a>
                                <span class="desc">
                                        <?php echo $resevent['eventdescription']; ?>
                                    </span>
                            </div>
                            <img src="<?php echo $resevent['imagelocation'] ?>" alt="">
                        </div>

                    <?php } ?>


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

                <?php $getevent1 = $mysqli->query("select * from events ORDER BY eventdate DESC LIMIT 1");
                $resevent1 = $getevent1->fetch_assoc();

                $year = date('Y', strtotime($resevent1['eventdate']));
                $month = date('m', strtotime($resevent1['eventdate']));
                $day = date('d', strtotime($resevent1['eventdate']));
                $time = date('h', strtotime($resevent1['eventtime']));


                ?>


                <div class="col-md-6 wow fadeInLeft">
                    <h3><?php echo $resevent1['eventname']; ?></h3>
                    <span class="time"><?php echo date('F j, Y', strtotime($resevent1['eventdate'])) . ' ' . date('h:i a', strtotime($resevent1['eventtime'])); ?>
                            </span>
                </div>

                <div class="col-md-6 wow fadeInRight" data-wow-delay=".25s">
                    <div id="eventCount"></div>
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

       <?php $getverse = $mysqli->query("select * from scriptures ORDER BY id DESC");
            while ($resverse = $getverse->fetch_assoc()){

       ?>

                        <div class="item">
                            <img src="assets/img/testi/pic%20(1).jpg" alt="" class="img-circle">
                            <blockquote>
                                <?php echo $resverse['biblequote'] ?>
                            </blockquote>
                            <span class="testi-by"><?php echo $resverse['bibleverse'] ?></span>
                        </div>

       <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->

</div>
<!-- footer begin -->

<?php include('includes/bottom.php'); ?>


<script>

    jQuery(document).ready(function () {

        var year = '<?php echo $year; ?>';
        var month = '<?php echo $month; ?>';
        var day = '<?php echo $day; ?>';
        var time = '<?php echo $time; ?>';

        $(function () {
            $('#eventCount').countdown({until: new Date(year, month - 1, day, time)}); // year, month, date, hour
        });
    });


</script>
