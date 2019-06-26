<?php

include('../../../config.php');

$randno = $_POST['randno'];

$today = date('Y-m-d H:i:s');

$target_path = "../../../uploads/pastors/";

$rand = rand(1,100000);

$allowed =  array('gif','png' ,'jpg', 'jpeg');

$ext = pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);

$filename =  $_FILES['Filedata']['name'];
$newfile = 'uploads/pastors/'.date('Ymd').$rand.".".$ext;
$target_path = "../../../uploads/pastors/".date('Ymd').$rand.".".$ext;


$filetype =  $_FILES['Filedata']['type'];
$filesize =  $_FILES['Filedata']['size'];


if(move_uploaded_file($_FILES['Filedata']['tmp_name'], $target_path)) {

    echo $success =  "The file ".  basename( $_FILES['Filedata']['name']). " has been uploaded";
}
else
{

    echo $error = "There was an error uploading the file, please try again!";

}


$chk = $mysqli->query("select * from pastors where pastorsid = '$randno'");

$count = mysqli_num_rows($chk);

if ($count == "0"){


    $insertfile  = $mysqli->query("INSERT INTO `pastors`
            (`pastorsid`,
             `imagename`,
             `imagelocation`,
             `imagesize`,
             `imagetype`,
             `period`)
VALUES ('$randno',
        '$filename',
        '$newfile',
        '$filesize',
        '$filetype',
        '$today')") or die ();

    echo 100;

}

else {

    $query = $mysqli->query("select * from `pastors` where pastorsid = '$randno'");
    $res = $query->fetch_assoc();
    $filename2 =  $res['imagelocation'];

    $use = substr($filename2,strpos($filename2,"/")+1);

    unlink("../../../uploads/".$use);



    $updatefile  = $mysqli->query("UPDATE `pastors`
SET 
  
  `imagename` = '$filename',
  `imagelocation` = '$newfile',
  `imagesize` = '$filesize',
  `imagetype` = '$filetype',
  `period` = '$today'
  
WHERE `pastorsid` = '$randno'") or die ();


    echo 101;

}



?>

