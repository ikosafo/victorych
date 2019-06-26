<?php

include('../../../config.php');

$randno = $_POST['randno'];

$today = date('Y-m-d H:i:s');

$target_path = "../../../uploads/gallery/";

$rand = rand(1,100000);

$allowed =  array('gif','png' ,'jpg', 'jpeg');

$ext = pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);

$filename =  $_FILES['Filedata']['name'];
$newfile = 'uploads/gallery/'.date('Ymd').$rand.".".$ext;
$target_path = "../../../uploads/gallery/".date('Ymd').$rand.".".$ext;


$filetype =  $_FILES['Filedata']['type'];
$filesize =  $_FILES['Filedata']['size'];


if(move_uploaded_file($_FILES['Filedata']['tmp_name'], $target_path)) {

    echo $success =  "The file ".  basename( $_FILES['Filedata']['name']). " has been uploaded";
}
else
{

    echo $error = "There was an error uploading the file, please try again!";

}




    $insertfile  = $mysqli->query("INSERT INTO `gallery`
            (`galleryid`,
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




?>

