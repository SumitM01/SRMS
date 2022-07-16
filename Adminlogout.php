<?php
session_start();
unset($_SESSION['name']);
unset($_SESSION['password']);
header('Location:Adminlogin.php');
?>