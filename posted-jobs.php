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
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>

<div class="menu">
    <a style="color: white; padding: 0px 20px;" href="job-posting.php">Post a job</a>
    <a style="color: white; padding: 0px 20px;" href="posted-jobs.php">My posted jobs</a>
    <a style="color: white; padding: 0px 20px;" href="logout.php">Logout</a>
</div>


<div class="field">
    <?php

    $conn=mysqli_connect("localhost", "root", "", "job");
    $query="SELECT * FROM employer WHERE id='$employer_id' ";
    $result=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($result);
    $org_name = $data['company_name'];


    $query="SELECT * FROM all_jobs WHERE company_name='$org_name' ";
    $result=mysqli_query($conn,$query);
    $number_of_rows=mysqli_num_rows($result);

    if($number_of_rows>0){
        while($data=mysqli_fetch_assoc($result)){
            ?>
            <table style="width: 50%; border: 1px solid black ">
                <tr>
                    <td>Title: <?php echo $data['title']?> </td>
                    <td>Location: <?php echo $data['location']?> </td>
                </tr>
                <tr>
                    <td>Date posted: <?php echo $data['posting_date']?> </td>
                    <td>Deadline: <?php echo $data['deadline']?> </td>
                </tr>
                <tr>
                    <td>Company name: <?php echo $data['company_name']?> </td>
                    <td></td>
                </tr>
                <tr>
                    <td>qualification: <?php echo $data['qualification']?> </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Experience: <?php echo $data['experience']?></td>
                    <td><a href="details.php?post_id=<?php echo $data['id']?>">Details</a></td>
                </tr>
                <tr>
                    <td><a href="applications.php?post_id=<?php echo $data['id']?>">applications</a></td>
                </tr>
                <tr>
                    <td><a href="edit-post.php?post_id=<?php echo $data['id']?>">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure you want to delete?')"; href="delete.php?post_id=<?php echo $data['id']?>">Delete</a></td>
                </tr>

            </table><br>
        <?php
        }
    }else{
        echo "You have not posted any job yet";
    }

    ?>


</div>

</body>
</html>