<?php

include('../../../config.php');


$scriptures_id=$_POST['i_index'];

$mysqli->query("delete from scriptures where id='$scriptures_id'")
or die(mysqli_error($mysqli));


?>