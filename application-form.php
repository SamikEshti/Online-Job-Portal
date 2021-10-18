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
<div class="menu">
    <a style="color: white; padding: 0px 20px;" href="seeker-dash.php">Dashboard</a>
    <a style="color: white; padding: 0px 20px;" href="search-jobs.php">Search a job</a>
    <a style="color: white; padding: 0px 20px;" href="logout.php">logout</a>
</div>

<form action="" method="post">
    <?php
    $post_id=($_GET['post_id']);

    $conn = mysqli_connect("localhost", "root", "", "job");
    $query = "SELECT * FROM all_jobs WHERE id='{$post_id}'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    ?>

    <table width="50%">
        <tr>
            <td><label>Company you are applying to</label></td>
            <td><input type="text" name="company_name" value="<?php echo $data['company_name']?>"></td>
        </tr>
        <tr>
            <td><label>Your full name</label></td>
            <td><input type="text" name="full_name"></td>
        </tr>
        <tr>
            <td><label>Position you are applying to</label></td>
            <td><input type="text" name="title" value="<?php echo $data['title']?>"></td>
        </tr>
        <tr>
            <td><button class="btn-submit" type="submit" name="btn" >Apply</button></td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST['btn'])){
    $company_name=$_POST['company_name'];
    $full_name=$_POST['full_name'];
    $title=$_POST['title'];


    $query="INSERT INTO applied_jobs (company_name, full_name, title, post_id) VALUES ('{$company_name}','{$full_name}','{$title}','{$post_id}')";
    if($company_name=='' || $full_name=='' || $title==''){
        echo "Please fill up all the fields";
    }else{
        if(mysqli_query($conn,$query)){
        }else{
            echo mysqli_error($conn);
        }
    }
}
?>

</body>
</html>
