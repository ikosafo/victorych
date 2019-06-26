<?php

include('../../../config.php');


$mission_statement = mysqli_real_escape_string($mysqli, $_POST['mission_statement']);
$vision = mysqli_real_escape_string($mysqli, $_POST['vision']);
$mission = mysqli_real_escape_string($mysqli, $_POST['mission']);


$chk = $mysqli->query("select * from about LIMIT 1");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `about`
            (`mission_statement`,
             `mission`,
             `vision`)
VALUES ('$mission_statement',
        '$mission',
        '$vision')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $aboutid = $_POST['aboutid'];

    $mysqli->query("UPDATE `about`
SET 
  `mission_statement` = '$mission_statement',
  `mission` = '$mission',
  `vision` = '$vision'
  
WHERE `id` = '$aboutid'") or die(mysqli_error($mysqli));

    echo 2;

}
?>