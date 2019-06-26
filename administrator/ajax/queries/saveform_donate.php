<?php

include('../../../config.php');

$donate_message = mysqli_real_escape_string($mysqli, $_POST['donate_message']);


$chk = $mysqli->query("select * from donate LIMIT 1");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `donate`
            (`message`)
            
VALUES ('$donate_message')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $donate_id = mysqli_real_escape_string($mysqli, $_POST['donate_id']);

    $mysqli->query("UPDATE `donate`
SET 

  `message` = '$donate_message'
  
WHERE `id` = '$donate_id'") or die(mysqli_error($mysqli));

    echo 2;

}
?>