<?php
session_start();
$employer_id = $_SESSION['employer_id'] ?? '';
if($employer_id){
    header("Location: employer-dash.php");
    die();
}

mysqli_connect('localhost', 'root', '', 'job');
$conn= mysqli_connect('localhost', 'root', '', 'job');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query= "SELECT * FROM employer WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $query);

    $number_of_user= mysqli_num_rows($result);

    if($number_of_user > 0){
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['employer_id'] = $data['id'];
        header("Location: employer-dash.php");
    }else{
        echo "no user found";
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
<div class="menu"><p>Employer login</p></div>

<hr>
<form action="" method="post">
    <input type="text" name="email" placeholder="Type email ..."><br><br>
    <input type="password" name="password" placeholder="Type password ..."><br><br>
    <button class="btn-submit" type="submit" name="submit">Login</button>
</body>
</html>
