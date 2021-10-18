<?php
session_start();
$seeker_id = $_SESSION['seeker_id'] ?? '';
if(!$seeker_id) {
    header("Location: seeker-login.php");
    die();
}
echo "Your data saved successfully";
echo "Please upload your CV here";
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
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input name="file" type="file">
    <button type="submit" name="submit">Upload</button>

</form>

</body>
</html>
