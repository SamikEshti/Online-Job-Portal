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
<div>
    <a href="logout.php">Logout</a>
    <a href="posted-jobs.php">My posted jobs</a>
</div>

<?php
session_start();
$employer_id = $_SESSION['employer_id'] ?? '';
if(!$employer_id){
    header("Location: employer-login.php");
    die();
}

$conn = mysqli_connect("localhost", "root", "", "job");

if(isset($_POST['btn'])){
    $company_name = $_POST['company_name'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $location = $_POST['location'];
    $posting_date = $_POST['posting_date'];
    $deadline = $_POST['deadline'];

    $conn= mysqli_connect("localhost", "root", "", "job");
    $query = "INSERT INTO all_jobs(company_name,category, title, description, experience, qualification, location, posting_date, deadline) VALUES ('$company_name','$category','$title','$description','$experience','$qualification','$location','$posting_date','$deadline')";

    if(mysqli_query($conn,$query)){
        echo "Job has been posted successfully";
    }else{
        echo "Something is wrong with the query";
    }
}

?>

    <p>Post a job from here</p>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <?php
                    $conn= mysqli_connect("localhost", "root", "", "job");
                        $query="SELECT * FROM employer WHERE id='{$employer_id}'";
                        $result=mysqli_query($conn,$query);
                        $data=mysqli_fetch_assoc($result);
                    ?>
                    <label>Company name</label>
                    <input type="text" name="company_name" value="<?php echo $data['company_name'];?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Job category</label>
                    <select name="category">
                        <option selected disabled>Select an job category</option>
                        <option value="engineering">Engineering</option>
                        <option value="accounting">Accounting</option>
                        <option value="finance">Finance</option>
                        <option value="teaching">Teaching</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Job title</label>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="description" rows="5" cols="60">

                    </textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Job experience</label>
                    <select name="experience">
                        <option selected disabled>Experience level</option>
                        <option value="fresher">Fresher</option>
                        <option value="1 to 2">1 to 2 years</option>
                        <option value="3 to 5">3 to 5 years</option>
                        <option value="5 plus">more than 5 years</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Academic qualification</label>
                    <select name="qualification">
                        <option selected disabled>Select education level</option>
                        <option value="hsc">HSC</option>
                        <option value="bachelor">Bachelor</option>
                        <option value="masters">Masters</option>
                        <option value="phd">PHD</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Select location</label>
                    <select name="location">
                        <option selected disabled>Select a location</option>
                        <option value="dhaka">Dhaka</option>
                        <option value="chittagong">Chittagong</option>
                        <option value="sylhet">Sylhet</option>
                        <option value="khulna">Khulna</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Select date</label>
                    <input type="date" name="posting_date">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Select deadline</label>
                    <input type="date" name="deadline">
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="btn">Post</button></td>
            </tr>
        </table>
    </form>
</body>
</html>