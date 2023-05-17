<?php
session_start();

#if the admin is logged in
if(isset($_SESSION['user_id']) &&
   isset($_SESSION['user_email'])){

        #Database connection file
        include "../db_conn.php";
  
    /* check if category
       name is submitted
       **/

    if(isset($_POST['category_name']) && 
       isset($_POST['category_id'])){
        /*
         Get data from POST request
         and store them in var 
         **/
        $name = $_POST['category_name'];
        $id = $_POST['category_id'];

        #simple from Validation
        if(empty($name)){
            $em = "The category name is required";
            header("Location: ../edit-category.php?error=$em&id=$id");
            exit;
        }else{
            #UPDATE the database
            $sql  = "UPDATE categories  
                    SET name=?
                    WHERE id=?";
            $stmt = $conn-> prepare($sql);
            $res  = $stmt->execute([$name, $id]);
            /*
                if there is no error while 
                updating the data
            */ 
            if($res){
                # Success message
                $sm = "Successfully updated !";
                header("Location: ../edit-category.php?success=$sm&id=$id");
                exit;
            }else{
                # Error message
                $em = "Unknown Error Occurred!";
                header("Location: ../edit-category.php?error=$em&id=$id");
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