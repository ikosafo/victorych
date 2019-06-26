<?php

include('../../../config.php');

$pastors_name = mysqli_real_escape_string($mysqli, $_POST['pastors_name']);
$pastors_description = mysqli_real_escape_string($mysqli, $_POST['pastors_description']);
$pastors_id = mysqli_real_escape_string($mysqli, $_POST['pastors_id']);


$chk = $mysqli->query("select * from pastors where pastorsid = '$pastors_id'");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `pastors`
            (`pastorsname`,
             `pastorsid`,
             `pastorsdescription`)
VALUES ('$pastors_name',
        '$pastors_id',
        '$pastors_description')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $mysqli->query("UPDATE `pastorss`
SET 
  `pastorsname` = '$pastors_name',
  `pastorsdescription` = '$pastors_description'
  
WHERE `pastorsid` = '$pastors_id'") or die(mysqli_error($mysqli));

    echo 2;

}
?>