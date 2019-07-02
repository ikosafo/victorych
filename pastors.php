<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Pastors</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <div class="clearfix"></div>

    <!-- content begin -->
    <div id="content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <ul class="blog-list">


                        <?php

                        $getpastors = $mysqli->query("select * from pastors ORDER BY pastorsname");

                        while ($respastors = $getpastors->fetch_assoc()) { ?>


                            <li style="width: 32% !important;">
                                <div class="preview">
                                    <img src="../<?php echo $respastors['imagelocation'] ?>" alt="" width="70" height="310"/>
                                    <a href="#">
                                        <h3 class="blog-title"><?php echo $respastors['pastorsname'] ?></h3>
                                    </a>
                                    <?php echo $respastors['pastorsdescription'] ?>
                                </div>
                            </li>



                            <?php }  ?>


                    </ul>


                </div>

            </div>

        </div>
    </div>


    <!-- section begin -->
<?php include('includes/blog.php'); ?>
    <!-- section close -->


    <!-- content close -->


<?php include('includes/bottom.php'); ?>