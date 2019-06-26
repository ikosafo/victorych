<?php

include('../../../config.php');

$overseer_message = mysqli_real_escape_string($mysqli, $_POST['overseer_message']);


$chk = $mysqli->query("select * from overseer LIMIT 1");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `overseer`
            (`message`)
            
VALUES ('$overseer_message')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $overseer_id = mysqli_real_escape_string($mysqli, $_POST['overseer_id']);

    $mysqli->query("UPDATE `overseer`
SET 

  `message` = '$overseer_message'
  
WHERE `id` = '$overseer_id'") or die(mysqli_error($mysqli));

    echo 2;

}
?>