<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Branches</h1>
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

  $getbranch = $mysqli->query("select * from branches ORDER BY branchname");
  while ($resbranch = $getbranch->fetch_assoc()) { ?>


      <!-- event item begin -->
      <div class="col-md-6 event-item">
          <div class="desc">
              <a href="#">
                  <h3><?php echo $resbranch['branchname'] ?></h3>
              </a>
              <span class="text">
                            <?php echo $resbranch['description'] ?>
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