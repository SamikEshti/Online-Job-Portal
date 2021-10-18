<?php
session_start();
$seeker_id = $_SESSION['seeker_id'] ?? '';
if(!$seeker_id) {
    header("Location: seeker-login.php");
    die();
}
$conn = mysqli_connect("localhost","root","","job");
$post_id = $_GET['post_id'];
$query = "SELECT description FROM all_jobs WHERE id= '{$post_id}'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
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
<div class="menu"><a style="color: white; padding: 0px 20px;" href="seeker-dash.php">Dashboard</a>
    <a style="color: white; padding: 0px 20px;" href="search-jobs.php">Search a job</a>
    <a style="color: white; padding: 0px 20px;" href="logout.php">logout</a></div>
<P>
    <?php echo $data['description'] ?>
</P>
<button class="btn-submit"><a href="application-form.php?post_id=<?php echo $post_id;?>">Apply</a></button>
</body>
</html>
