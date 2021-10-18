<?php
session_start();
$admin_id = $_SESSION['admin_id'] ?? '';
if(!$admin_id) {
    header("Location: admin-login.php");
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
<div class="header"><p>Welcome admin</p></div>
<div class="menu"><a href="logout.php" style="color: white">Logout</a></div>
<div class="texts"><p>Employer list</p></div>

         <table class="tbl-std">
             <tr>
                 <th>Company name</th>
                 <th>Email</th>
                 <th>Action</th>
             </tr>
             <?php
             $conn = mysqli_connect("localhost","root","","job");
             $query = "SELECT * FROM employer";
             $result=mysqli_query($conn,$query);

             while($data=mysqli_fetch_assoc($result)){
             ?>
             <tr>
                 <td><?php echo $data['company_name']?></td>
                 <td><?php echo $data['email']?></td>
                 <td><button class="btn-delete"><a onclick="return confirm('Are you sure you want to delete?')"; href="?delete-id=<?php echo $data['id']?>">Delete</button></a></td>
             </tr>
                 <?php
             }
             ?>
         </table>



<?php
$delete_id=$_GET['delete-id']??'';
if(isset($delete_id)){
    $delete_query = "DELETE  FROM employer WHERE id='{$delete_id}'";
    mysqli_query($conn,$delete_query);
}
?>
<br><br>
<div class="texts"><p>Seeker list</p></div>
<table class="tbl-std">
    <tr>
        <th>Seeker emails</th>
        <th>Email</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","job");
    $query = "SELECT * FROM seeker";
    $result=mysqli_query($conn,$query);

    while($data=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $data['email']?></td>
            <td><button class="btn-delete"><a onclick="return confirm('Are you sure you want to delete?')"; href="?skr-delete-id=<?php echo $data['id']?>">Delete</button></a></td>
        </tr>
        <?php
    }
    ?>
</table>



<?php
$skr_delete_id=$_GET['skr-delete-id']??'';
if(isset($skr_delete_id)){
    $skr_delete_query = "DELETE  FROM seeker WHERE id='{$skr_delete_id}'";
    mysqli_query($conn,$skr_delete_query );
}
?>



</body>
</html>