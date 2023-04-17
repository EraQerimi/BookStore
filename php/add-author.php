<?php
session_start();

#if the admin is logged in
if(isset($_SESSION['user_id']) &&
   isset($_SESSION['user_email'])){

        #Database connection file
        include "../db_conn.php";
  
    /* check if author
       name is submitted
       **/

    if(isset($_POST['author_name'])){
        /*
         Get data from POST request
         and store it in var 
         **/
        $name = $_POST['author_name'];

        #simple from Validation
        if(empty($name)){
            $em = "The author name is required";
            header("Location: ../add-author.php?error=$em");
            exit;
        }else{
            #insert into database
            $sql  = "INSERT INTO authors (name) 
                    VALUES (?)";
            $stmt = $conn-> prepare($sql);
            $res  = $stmt->execute([$name]);
            /*
                if there is no error while 
                inserting the data
            */ 
            if($res){
                # Success message
                $sm = "Successfully created!";
                header("Location: ../add-author.php?success=$sm");
                exit;
            }else{
                # Error message
                $em = "Unknown Error Occurred!";
                header("Location: ../add-author.php?error=$em");
                exit;
            }
        }        

   
}else{
    header("Location: ../admin.php");
    exit;
}



}else{
    header("Location: ../login.php");
    exit;
} 