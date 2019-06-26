<?php

include('../../../config.php');


$homeslider_text1 = mysqli_real_escape_string($mysqli, $_POST['homeslider_text1']);
$homeslider_text2 = mysqli_real_escape_string($mysqli, $_POST['homeslider_text2']);
$homeslider_description = mysqli_real_escape_string($mysqli, $_POST['homeslider_description']);
$homeslider_id = mysqli_real_escape_string($mysqli, $_POST['homeslider_id']);



$chk = $mysqli->query("select * from homeslider where sliderid = '$homeslider_id'");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `homeslider`
            (`text1`,
             `text2`,
             `description`,
             `sliderid`
             )
VALUES ('$homeslider_text1',
        '$homeslider_text2',
        '$homeslider_description',
        '$homeslider_id')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


}

else {

    $mysqli->query("UPDATE `homeslider`
SET 
  `text1` = '$homeslider_text1',
  `text2` = '$homeslider_text2',
  `description` = '$homeslider_description'
  
WHERE `sliderid` = '$homeslider_id'") or die(mysqli_error($mysqli));

    echo 2;

}
?>