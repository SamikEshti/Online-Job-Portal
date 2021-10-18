<?php
session_start();
$employer_id = $_SESSION['employer_id'] ?? '';
if(!$employer_id) {
    header("Location: employer-login.php");
    die();
}
$post_id=$_GET['post_id'];
$conn=mysqli_connect("localhost","root","","job");
$query="SELECT * FROM applied_jobs WHERE id='{$post_id}'";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result);
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
<table class="tbl-std">
    <tr>
        <th>Applicant full name</th>

        <th>Position applied for:</th>

    </tr>
    <tr>
        <td><?php echo $data['full_name'];?></td>
        <td><?php echo $data['title'];?></td>
    </tr>
</table>

</body>
</html>
