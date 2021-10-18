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
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="menu"><a style="color: white; padding: 0px 20px;" href="seeker-dash.php">Dashboard</a>
    <a style="color: white; padding: 0px 20px;" href="logout.php">Logout</a></div>

<div class="texts"><p>Select your desired job type</p></div>

<form action="" method="post">
    <table width="50%">
        <tr>
            <td>Please select a job type</td>
            <td>
                <select name="category">
                    <option selected disabled>Please select a job category</option>
                    <option value="engineering">Engineering</option>
                    <option value="accounting">Accounting</option>
                    <option value="finance">Finance</option>
                    <option value="teaching">Teaching</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><button type="submit" name="btn">Search</button></td>
        </tr>
    </table>
</form>
<?php
$category='';

if(isset($_POST['btn'])){
    $category = $_POST['category']??'';
}
$conn = mysqli_connect("localhost","root", "", "job");
$query = "SELECT * FROM all_jobs WHERE category='{$category}'";

$result = mysqli_query($conn,$query);
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
                <td><a href="apply-details.php?post_id=<?php echo $data['id']?>">Details</a></td>
            </tr>
        </table><br>
        <?php
    }
}else{
    echo "There is no job is this category";
}
?>
</body>
</html>
