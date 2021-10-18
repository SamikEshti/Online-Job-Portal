<?php
session_start();
$employer_id = $_SESSION['employer_id'] ?? '';
if(!$employer_id) {
    header("Location: employer-login.php");
    die();
}
$conn = mysqli_connect("localhost","root","","job");
$post_id = $_GET['post_id'];
$query = "SELECT description FROM all_jobs WHERE id= '{$post_id}' ";
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
    <title>Document</title>
</head>
<body>
    <P>
        <?php echo $data['description'] ?>
    </P>
</body>
</html>
