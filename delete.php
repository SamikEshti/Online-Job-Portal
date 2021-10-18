<?php
session_start();
$employer_id = $_SESSION['employer_id'] ?? '';
if(!$employer_id) {
    header("Location: employer-login.php");
    die();
}

$conn= mysqli_connect("localhost", "root", "", "job");
$post_id = $_GET['post_id']??'';

if(isset($post_id)){
    $delete_query = "DELETE  FROM all_jobs WHERE id='{$post_id}'";
    mysqli_query($conn,$delete_query);
    header("Location:posted-jobs.php");
}
