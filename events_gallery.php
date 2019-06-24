<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Events Gallery</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <div class="clearfix"></div>

    <!-- content begin -->
    <section id="section-gallery">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center wow fadeInUp">
                    <h2>From Gallery</h2>
                    <div class="divider-double"></div>
                </div>


                <div class="col-md-12">
                    <ul id="filters">
                        <li><a href="#" data-filter="*" class="selected">show all</a></li>
                        <li><a href="#" data-filter=".event">event</a></li>
                        <li><a href="#" data-filter=".news">news</a></li>
                        <li><a href="#" data-filter=".gallery">gallery</a></li>
                    </ul>

                </div>
            </div>
            <div class="row">

                <div id="gallery-isotope" class="col-md-12 wow fadeInUp zoom-gallery col-md-12" data-wow-delay=".25s">
                    <div class="item long-pic news">
                        <a href="assets/img/gallery/pic%20(1).jpg" data-gal="prettyPhoto[galllery]"><span
                                    class="overlay"></span></a>
                        <img src="assets/img/gallery/pic%20(1).jpg" alt="">
                    </div>

                    <div class="item small-pic event">
                        <a href="assets/img/gallery/pic%20(2).jpg" data-gal="prettyPhoto[galllery]"><span
                                    class="overlay"></span></a>
                        <img src="assets/img/gallery/pic%20(2).jpg" alt="">
                    </div>

                    <div class="item wide-pic event">
                        <a href="assets/img/gallery/pic%20(3).jpg" data-gal="prettyPhoto[galllery]"><span
                                    class="overlay"></span></a>
                        <img src="assets/img/gallery/pic%20(3).jpg" alt="">
                    </div>

                    <div class="item wide-pic gallery">
                        <a href="assets/img/gallery/pic%20(4).jpg" data-gal="prettyPhoto[galllery]"><span
                                    class="overlay"></span></a>
                        <img src="assets/img/gallery/pic%20(4).jpg" alt="">
                    </div>

                    <div class="item small-pic gallery">
                        <a href="assets/img/gallery/pic%20(5).jpg" data-gal="prettyPhoto[galllery]"><span
                                    class="overlay"></span></a>
                        <img src="assets/img/gallery/pic%20(5).jpg" alt="">
                    </div>


                </div>
            </div>
        </div>
    </section>


    <!-- section begin -->
<?php include('includes/blog.php'); ?>
    <!-- section close -->


    <!-- content close -->


<?php include('includes/bottom.php'); ?>