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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="header"><p>Welcome seeker</p></div>
    <div class="menu">
        <a style="padding: 0px 20px; color:white;" href="search-jobs.php">Search a job</a>
        <a style="padding: 0px 20px; color:white;" href="logout.php">Logout</a>
    </div>


    <div class="field">
        <?php
        $conn=mysqli_connect("localhost", "root", "", "job");

        $query="SELECT * FROM all_jobs";
        $result=mysqli_query($conn,$query);
        $number_of_rows=mysqli_num_rows($result);

        if($number_of_rows>0){
            while($data=mysqli_fetch_assoc($result)){
                ?>
                <div class="post-cards">
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
                        <td><a href="apply-details.php?post_id=<?php echo $data['id']?>">Details</a></td>
                    </tr>
                    <tr>
                        <td><button class="btn-submit"><a href="application-form.php?post_id=<?php echo $data['id'];?>">Apply</a></button></td>
                    </tr>

                </table></div><br>
                <?php
            }
        }else{
            echo "You have not posted any job yet";
        }

        ?>


    </div>
</body>
</html>