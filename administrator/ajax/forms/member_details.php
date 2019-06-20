<?php include("../../../config.php");

$id = $_POST['id_index'];

$app = $mysqli->query("select * from member where id = '$id'");
$result = $app->fetch_assoc();
$memberid = $result['memberid'];

?>


<script>

    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>

<!-- START APP WRAPPER -->
<a href="view_members.php">
    <button class="btn btn-warning btn-floating" id="close_page"
            style="float: right">
        <i class="icon-arrow-left-circle"></i> Close/Go Back
    </button>
</a>


<section class="page-content container-fluid">

    <div class="row">

        <div class="card">
            <div class="card-header">
        <span style="text-transform: uppercase">View Member Details of <?php  $fname = $result['surname'] . ' ' . $result['firstname'] . ' ' . $result['othername'];
            $title = $result['title'];

            if ($title == "Other") {
                $title = $result['othertitle'];
                echo $title . ' ' . $fname;
            } else {
                echo $title . ' ' . $fname;
            }
            ?></span>
            </div>
            <div class="row">
                <div class="col">

                    <div id="print_this">
                        <div class="invoice-wrapper">
                            <div class="invoice-header border-bottom">
                                <div class="row">

                                    <div class="col-md-2" align="center">
                                        <img src="assets/img/logo.jpg"
                                             style="border: 0 !important;"/>
                                    </div>
                                    <div class="col-md-10" align="center">
                                        <h2 style="font-weight: bold;">CHRIST VISION SANCTUARY INTERNATIONAL</h2>
                                        <h4 style="text-transform: uppercase"><?php $branchid = $result['branch'];
                                            $getb = $mysqli->query("select * from branch where id = '$branchid'");
                                            $resb = $getb->fetch_assoc();
                                            echo $resb['name'];
                                            ?></h4>

                                    </div>


                                </div>
                                <div class="invoice-summary">

                                    <h4>Personal Profile</h4>

                                    <div class="row">

                                        <div class="col-md-3">

                                            <?php
                                            $img = $mysqli->query("select * from member_images
                                                                         where memberid = '$memberid'");

                                            $fetch_img = $img->fetch_assoc() ?>


                                            <div class="profile-image"><img
                                                    src="../<?php echo $fetch_img['image_location'] ?>"
                                                    alt="" style="width: 80%">
                                            </div>

                                            <hr/>
                                            <div>
                                                <h5 class="m-b-0"><strong><?php
                                                        $fname = $result['surname'] . ' ' . $result['firstname'] . ' ' . $result['othername'];
                                                        $title = $result['title'];

                                                        if ($title == "Other") {
                                                            $title = $result['othertitle'];
                                                            echo $title . ' ' . $fname;
                                                        } else {
                                                            echo $title . ' ' . $fname;
                                                        }


                                                        ?>
                                                    </strong>
                                                </h5>

                                            </div>

                                            <hr>


                                        </div>
                                        <div class="col-md-3">

                                            <small class="text-muted">Gender:</small>
                                            <p><?php echo $result['gender'] ?></p>
                                            <hr>
                                            <small class="text-muted">Telephone:</small>
                                            <p><?php echo $result['telephone'] ?></p>
                                            <hr>
                                            <small class="text-muted">Alternative Telephone:</small>
                                            <p><?php echo $result['alttelephone'] ?></p>
                                            <hr>

                                        </div>


                                        <div class="col-md-3">

                                            <small class="text-muted">Email Address:</small>
                                            <p><?php echo $result['emailaddress'] ?></p>
                                            <hr>
                                            <small class="text-muted">Date of Birth:</small>
                                            <p><?php echo date("jS M, Y", strtotime($result['birthdate'])) ?></p>
                                            <hr>
                                            <small class="text-muted">Nationality:</small>
                                            <p><?php echo $result['nationality'] ?></p>
                                            <hr>

                                        </div>

                                        <div class="col-md-3">
                                            <small class="text-muted">Hometown:</small>
                                            <p><?php echo $result['hometown'] ?></p>
                                            <hr>
                                            <small class="text-muted">Residence:</small>
                                            <p><?php echo $result['residence'] ?></p>
                                            <hr>
                                            <small class="text-muted">House Number:</small>
                                            <p><?php echo $result['housenumber'] ?></p>
                                            <hr>
                                        </div>
                                    </div>

                                    <hr/>

                                    <h4>Education and Business</h4>


                                    <div class="row">
                                        <div class="col-md-4">

                                            <small class="text-muted">Educational Level:</small>
                                            <p><?php echo $result['educationallevel'] ?></p>
                                            <hr>
                                            <small class="text-muted">Last Institution Attended:</small>
                                            <p><?php echo $result['institutionattended'] ?></p>
                                            <hr>

                                        </div>


                                        <div class="col-md-4">

                                            <small class="text-muted">Qualification:</small>
                                            <p><?php echo $result['qualification'] ?></p>
                                            <hr>
                                            <small class="text-muted">Occupation:</small>
                                            <p><?php echo $result['occupation'] ?></p>
                                            <hr>

                                        </div>

                                        <div class="col-md-4">
                                            <small class="text-muted">Place of Work/Company:</small>
                                            <p><?php echo $result['workplace'] ?></p>
                                            <hr>
                                            <small class="text-muted">Job Position:</small>
                                            <p><?php echo $result['jobposition'] ?></p>
                                            <hr>

                                        </div>
                                    </div>


                                    <hr/>

                                    <h4>Family</h4>


                                    <div class="row">
                                        <div class="col-md-3">

                                            <small class="text-muted">Marital Status:</small>
                                            <p><?php echo $ms = $result['maritalstatus'] ?></p>
                                            <hr>
                                            <small class="text-muted">Name of Spouse:</small>
                                            <p><?php
                                                if ($ms = !"Married") {
                                                    echo "N/A";
                                                } else {
                                                    echo $result['spousename'];
                                                }
                                                ?></p>
                                            <hr>

                                        </div>


                                        <div class="col-md-3">

                                            <small class="text-muted">Is Father alive?:</small>
                                            <p><?php echo $fa = $result['fatheralive'] ?></p>
                                            <hr>
                                            <small class="text-muted">Name of Father:</small>
                                            <p><?php
                                                if ($fa = !"Yes") {
                                                    echo "N/A";
                                                } else {
                                                    echo $result['fathername'];
                                                }
                                                ?></p>
                                            <hr>

                                        </div>

                                        <div class="col-md-3">

                                            <small class="text-muted">Is Mother alive?:</small>
                                            <p><?php echo $ma = $result['motheralive'] ?></p>
                                            <hr>
                                            <small class="text-muted">Name of Mother:</small>
                                            <p><?php
                                                if ($ma = !"Yes") {
                                                    echo "N/A";
                                                } else {
                                                    echo $result['mothername'];
                                                }
                                                ?></p>
                                            <hr>

                                        </div>

                                        <div class="col-md-3">

                                            <small class="text-muted">Have children?:</small>
                                            <p><?php echo $hc = $result['havechildren'] ?></p>
                                            <hr>
                                            <small class="text-muted">Names of Children:</small>
                                            <p><?php
                                                if ($hc = !"Yes") {
                                                    echo "N/A";
                                                } else {

                                                    $getchild = $mysqli->query("select * from children where memberid = '$memberid'");

                                                    ?>


                                                    <?php
                                                    while ($resch = $getchild->fetch_assoc()) {

                                                        echo $resch['childname'].'<br/>';
                                                    }
                                                }
                                                ?>
                                            </p>
                                            <hr>

                                        </div>

                                    </div>


                                    <hr/>

                                    <h4>Ministry Groups</h4>



                                    <div class="row">
                                        <div class="col-md-4">

                                            <small class="text-muted">Department:</small>
                                            <p><?php $di = $result['department'];
                                                $getd = $mysqli->query("select * from department where id = '$di'");
                                                $resd = $getd->fetch_assoc();
                                                echo $resd['department_name'];
                                                if ($di == "None"){
                                                    echo "None";
                                                }
                                                ?></p>
                                            <hr>
                                        </div>


                                        <div class="col-md-4">

                                            <small class="text-muted">Ministry:</small>
                                            <p><?php $mi = $result['ministry'];
                                                $getm = $mysqli->query("select * from ministry where id = '$mi'");
                                                $resm = $getm->fetch_assoc();
                                                echo $resm['ministry_name'];
                                                if ($mi == "None"){
                                                    echo "None";
                                                }
                                                ?></p>
                                            <hr>

                                        </div>

                                        <div class="col-md-4">

                                            <small class="text-muted">Cell:</small>
                                            <p><?php $ci = $result['cell'];
                                                $getc = $mysqli->query("select * from cell where id = '$ci'");
                                                $resc = $getc->fetch_assoc();
                                                echo $resc['cell_name'];
                                                if ($ci == "None"){
                                                    echo "None";
                                                }
                                                ?></p>
                                            <hr>

                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bg-light">


                        <button class="btn btn-primary pull-right m-t-20 m-b-20 mr-lg-5"
                                onclick="printContent('print_this')"><i class="icon-printer" style="color: #ffffff"></i>
                            Print Form
                        </button>

                    </div>

                </div>
            </div>
        </div>

    </div>

</section>


