<?php

include('../../../config.php');

$branch_name = mysqli_real_escape_string($mysqli, $_POST['branch_name']);
$branch_description = mysqli_real_escape_string($mysqli, $_POST['branch_description']);


$chk = $mysqli->query("select * from branches where branchname = '$branch_name'");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `branches`
            (`branchname`,
             `description`)
VALUES ('$branch_name',
        '$branch_description')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $mysqli->query("UPDATE `branches`
SET 
  `description` = '$branch_description'
  
WHERE `branchname` = '$branch_name'") or die(mysqli_error($mysqli));

    echo 2;

}
?>