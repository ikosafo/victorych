<?php

include('../../../config.php');

$history_message = mysqli_real_escape_string($mysqli, $_POST['history_message']);


$chk = $mysqli->query("select * from history LIMIT 1");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `history`
            (`message`)
            
VALUES ('$history_message')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $history_id = mysqli_real_escape_string($mysqli, $_POST['history_id']);

    $mysqli->query("UPDATE `history`
SET 

  `message` = '$history_message'
  
WHERE `id` = '$history_id'") or die(mysqli_error($mysqli));

    echo 2;

}
?>