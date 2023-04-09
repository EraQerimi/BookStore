<?php 
session_start();

if (isset($_POST['email'])&&
isset($_POST['password'])){

    #Database Connection file
    include "../db_conn.php";

    #Validationi helper function
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

#search for thr email
$sql = "SELECT * FROM admin WHERE email =?";

$stmt = $conn->prepare($sql);
$stmt ->execute([$email]);

#if the email already exists
if($stmt->rowCount()=== 1){
    $user = $stmt->fetch();

    $user_id = $user['id'];
    $user_email = $user['email'];
    $user_pasword = $user['password'];
    if ($email === $user_email){
        if(password_verify($password, $user_pasword)){
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_email'] = $user_email;
            header("Location: ../admin.php");
        }else{
            #error message
            $em = "Incorrect Username or Password";
            header("Location: ../login.php?error=$em");
        }
        
    }else{
        #error message
        $em = "Incorrect Username or Password";
        header("Location: ../login.php?error=$em");
    }
}else{
    #error message
    $em = "Incorrect Username or Password";
    header("Location: ../login.php?error=$em");
}

}else{
    #Redirect to login
    header("Location: ../login.php");
}


?> 