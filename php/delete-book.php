<?php
session_start();

#if the admin is logged in
if(isset($_SESSION['user_id']) &&
   isset($_SESSION['user_email'])){

        #Database connection file
        include "../db_conn.php";
  
    /* check if the book
       id is set
       **/

    if(isset($_GET['id'])){
        /*
         Get data from POST request
         and store them in var 
         **/
        $name = $_POST['author_name'];
      

        #simple from Validation
        if(empty($name)){
            $em = "The author name is required";
            header("Location: ../edit-author.php?error=$em&id=$id");
            exit;
        }else{
            #UPDATE the database
            $sql  = "UPDATE authors  
                    SET name=?
                    WHERE id=?";
            $stmt = $conn-> prepare($sql);
            $res  = $stmt-> execute([$name, $id]);
            /*
                if there is no error while 
                inserting the data
            */ 
            if($res){
                # Success message
                $sm = "Successfully updated !";
                header("Location: ../edit-author.php?success=$sm&id=$id");
                exit;
            }else{
                # Error message
                $em = "Unknown Error Occurred!";
                header("Location: ../edit-author.php?error=$em&id=$id");
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