<?php

include('../../../config.php');


$branch_id=$_POST['i_index'];

$mysqli->query("delete from branches where id='$branch_id'")
or die(mysqli_error($mysqli));


?>