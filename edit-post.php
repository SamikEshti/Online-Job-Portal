<?php
session_start();
$employer_id = $_SESSION['employer_id'] ?? '';
if(!$employer_id) {
    header("Location: employer-login.php");
    die();
}
$conn = mysqli_connect("localhost","root","","job");
$post_id=$_GET['post_id'];
$query="SELECT * FROM all_jobs WHERE id='{$post_id}'";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result);

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


    $query = "UPDATE all_jobs SET company_name='{$company_name}',category='{$category}',title='{$title}',description='{$description}',experience='{$experience}',qualification='{$qualification}',location='{$location}',posting_date='{$posting_date}',deadline='{$deadline}' WHERE id='{$post_id}' ";

    if(mysqli_query($conn,$query)){
        header("Location: posted-jobs.php");
    }
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
<form action="" method="post">
    <table>
        <tr>
            <td>
                <label>Company name</label>
                <input type="text" name="company_name" value="<?php echo $data['company_name'];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label>Job category</label>
                <select name="category">
                    <option  selected disabled>Select a job category</option>
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
                <input type="text" value="<?php echo $data['title']?>" name="title">
            </td>
        </tr>
        <tr>
            <td>
                    <textarea name="description" rows="5" cols="60">
                        <?php echo $data['description']?>
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
            <td><button type="submit" name="btn">Update</button></td>
        </tr>
    </table>
</form>
</body>
</html>