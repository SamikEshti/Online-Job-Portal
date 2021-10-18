<?php
session_start();
$seeker_id = $_SESSION['seeker_id'] ?? '';
if(!$seeker_id) {
    header("Location: seeker-login.php");
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="seeker-dash.php">Dashboard</a><br>
<a href="search-jobs.php">Search a job</a><br>
<a href="logout.php">logout</a><br>

</body>
</html>
<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $file_type = $_FILES['file']['type'];

    $file_ext = explode(".",$file_name);
    $file_actual_extension = strtolower(end($file_ext));
    $allowed_types= ["jpg","jpeg","png","pdf"];

    if(in_array($file_actual_extension,$allowed_types)){
                if($file_error===0){
                    if($file_size < 1000000){
                        $file_name_unq = uniqid('', true).".".$file_actual_extension;
                        $file_destination='uploads/'.$file_name_unq;
                        move_uploaded_file($file_tmp_name,$file_destination);
                        echo "CV is uploaded successfully";
                    }else{
                        echo "This file is too big";
                    }
                }else{
                    echo "There was an error uploading your file";
                }
    }else{
        echo "you can not upload this type of file";
    }
}
?>

