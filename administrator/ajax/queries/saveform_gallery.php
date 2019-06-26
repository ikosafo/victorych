<?php

include('../../../config.php');

$event_name = mysqli_real_escape_string($mysqli, $_POST['event_name']);
$gallery_id = mysqli_real_escape_string($mysqli, $_POST['gallery_id']);


$chk = $mysqli->query("select * from gallery where galleryid = '$gallery_id'");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `eventgallery`
            (`eventname`,
             `galleryid`
             )
VALUES ('$event_name',
        '$gallery_id')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $mysqli->query("UPDATE `eventgallery`
SET 
  `eventname` = '$event_name'
  
WHERE `galleryid` = '$gallery_id'") or die(mysqli_error($mysqli));

    echo 2;

}
?>