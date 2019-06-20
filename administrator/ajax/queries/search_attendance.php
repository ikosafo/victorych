<?php
include ('../../../config.php');

$daterange = $_POST['date_range'];

$datefrom = substr($daterange,0,10);
$dateto = substr($daterange,-10);

//$branch = $_SESSION['branch'];

$dep = $mysqli->query("SELECT * FROM attendance WHERE datereported 
                               BETWEEN '$datefrom' AND '$dateto' ORDER BY `datereported` DESC");


?>

<div class="card">

    <h5 class="card-header">Attendance Search <strong>

        </strong></h5>
    <div class="card-body">

        <table id="bs4-table" class="table table-striped table-bordered"
               style="width:100% !important;">
            <thead>
            <tr>
                <th>Branch</th>
                <th>Name of Attendee</th>
                <th>Service Name</th>
                <th>Period Reported</th>


            </tr>
            </thead>
            <tbody>

            <?php
            while ($resdep = $dep->fetch_assoc()) {


                ?>
                <tr>
                    <td>
                        <?php
                        $branchid = $resdep['branch'];
                        $getb = $mysqli->query("select * from branch where id = '$branchid'");
                        $resb = $getb->fetch_assoc();
                        echo $resb['name'];

                        ?>
                    </td>
                    <td><?php $memberid = $resdep['memberid'];
                        $getmem = $mysqli->query("select * from member where memberid = '$memberid'");
                        $resmem = $getmem->fetch_assoc();
                        echo $resmem['surname'].' '.$resmem['firstname'].' '.$resmem['othername'];
                        ?>
                    </td>
                    <td><?php $serviceid = $resdep['service'];
                        $getser = $mysqli->query("select * from service where id = '$serviceid'");
                        $resser = $getser->fetch_assoc();
                        echo $resser['service_name'];
                        ?>
                    </td>
                    <td><?php echo $resdep['datereported']; ?></td>

                </tr>

                <?php
            }
            ?>
            </tbody>
            <tfoot>

        </table>


    </div>



</div>

<script>

    $('#bs4-table').DataTable();

</script>









