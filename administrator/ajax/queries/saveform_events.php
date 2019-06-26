<?php

include('../../../config.php');

$event_name = mysqli_real_escape_string($mysqli, $_POST['event_name']);
$daterange = mysqli_real_escape_string($mysqli, $_POST['event_date']);
$event_date = substr($daterange,0,10);
$event_dateto = substr($daterange,-10);
$event_time = mysqli_real_escape_string($mysqli, $_POST['event_time']);
$event_venue = mysqli_real_escape_string($mysqli, $_POST['event_venue']);
$event_description = mysqli_real_escape_string($mysqli, $_POST['event_description']);
$event_id = mysqli_real_escape_string($mysqli, $_POST['event_id']);


$chk = $mysqli->query("select * from events where eventid = '$event_id'");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `events`
            (`eventname`,
             `eventdate`,
             `eventdateto`,
             `eventtime`,
             `eventvenue`,
             `eventdescription`)
VALUES ('$event_name',
        '$event_date',
        '$event_dateto',
        '$event_time',
        '$event_venue',
        '$event_description')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $mysqli->query("UPDATE `events`
SET 
  `eventname` = '$event_name',
  `eventdate` = '$event_date',
  `eventdateto` = '$event_dateto',
  `eventtime` = '$event_time',
  `eventvenue` = '$event_venue',
  `eventdescription` = '$event_description'
  
WHERE `eventid` = '$event_id'") or die(mysqli_error($mysqli));

    echo 2;

}
?>