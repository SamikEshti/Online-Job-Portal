<?php
session_start();
$employer_id = $_SESSION['employer_id'] ?? '';
if(!$employer_id) {
    header("Location: employer-login.php");
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
<div class="header"><p>Welcome employer</p></div>

    <div class="menu">
        <a style="color: white; padding: 0px 20px;" href="job-posting.php">Post a job</a>
        <a style="color: white; padding: 0px 20px;" href="posted-jobs.php">My posted jobs</a>
        <a style="color: white; padding: 0px 20px;" href="logout.php">Logout</a>
    </div>
</body>
</html>