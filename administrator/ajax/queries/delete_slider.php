<?php

include('../../../config.php');


$homeslider_id=$_POST['i_index'];

$query = $mysqli->query("select * from `homeslider` where id = '$homeslider_id'");
$res = $query->fetch_assoc();
$filename2 =  $res['imagelocation'];

$use = substr($filename2,strpos($filename2,"/")+1);

unlink("../../../uploads/".$use);




$mysqli->query("delete from homeslider where id='$homeslider_id'")
or die(mysqli_error($mysqli));


?>