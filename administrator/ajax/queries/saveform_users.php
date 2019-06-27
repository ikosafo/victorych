<?php

include('../../../config.php');

$full_name = mysqli_real_escape_string($mysqli, $_POST['full_name']);
$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);


$chk = $mysqli->query("select * from users where username = '$username'");

$count = mysqli_num_rows($chk);


if ($count == "0") {


    $mysqli->query("INSERT INTO `users`
            (`fullname`,
             `username`,
             `password`
             )
VALUES ('$full_name',
        '$username',
        '$password'
        )
        ")
    or die(mysqli_error($mysqli));

    echo 1;


}

else {

    echo 2;

}

?>