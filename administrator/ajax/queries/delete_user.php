<?php

include('../../../config.php');


$users_id=$_POST['i_index'];

$mysqli->query("delete from users where id='$users_id'")
or die(mysqli_error($mysqli));


?>