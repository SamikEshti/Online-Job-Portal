<?php
session_start();
$admin_id = $_SESSION['admin_id'] ?? '';
if($admin_id){
    header("Location: admin-dash.php");
    die();
}

mysqli_connect('localhost', 'root', '', 'job');
$conn= mysqli_connect('localhost', 'root', '', 'job');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query= "SELECT * FROM admin WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $query);

    $number_of_user= mysqli_num_rows($result);

    if($number_of_user > 0){
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['admin_id'] = $data['id'];
        header("Location: admin-dash.php");
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
    <title>Document</title>
</head>
<body>
<h3>Employer login</h3>
<hr>
<form action="" method="post">
    <input type="text" name="email" placeholder="Type email ..."><br><br>
    <input type="password" name="password" placeholder="Type password ..."><br><br>
    <button type="submit" name="submit">Login</button>
</body>
</html>
