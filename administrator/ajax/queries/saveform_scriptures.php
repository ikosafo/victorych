<?php

include('../../../config.php');

$bible_verse = mysqli_real_escape_string($mysqli, $_POST['bible_verse']);
$bible_quote = mysqli_real_escape_string($mysqli, $_POST['bible_quote']);


$chk = $mysqli->query("select * from scriptures where bibleverse = '$bible_verse'");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `scriptures`
            (`bibleverse`,
             `biblequote`)
VALUES ('$bible_verse',
        '$bible_quote')
        ")
    or die(mysqli_error($mysqli));

    echo 1;


} else {

    $mysqli->query("UPDATE `scriptures`
SET 
  `biblequote` = '$bible_quote'
  
WHERE `bibleverse` = '$bible_verse'") or die(mysqli_error($mysqli));

    echo 2;

}
?>