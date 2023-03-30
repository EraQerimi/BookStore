<?php 

if (isset($_POST['email'])&&
isset($_POST['password'])){

    include "func-validation.php"; 


    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $text = "Email";
    $location = "../login.php";
    $ms = "error";
    is_empty($email , $text, $location, $ms, "");

    $text = "Password";
    $location = "../login.php";
    $ms = "error";
    is_empty($password , $text, $location, $ms, "");


    

}


?> 