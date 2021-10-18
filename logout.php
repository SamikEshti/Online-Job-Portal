<?php
session_start();
$_SESSION['admin_id']='';
$_SESSION['employer_id']='';
$_SESSION['seeker_id']='';
session_destroy();
header("Location: home.php");