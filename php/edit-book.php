<?php
session_start();

#if the admin is logged in
if(isset($_SESSION['user_id']) &&
   isset($_SESSION['user_email'])){

        #Database connection file
        include "../db_conn.php";

        # Validation helper function
        include "func-validation.php";

        # File Upload helper function
        include "func-file-upload.php";

        # Validation helper function
        include "func-validation.php";

        # File Upload helper function
        include "func-file-upload.php";
    
     /*	  If all Input field
	  are filled
	**/
    if(isset($_POST['book_id'])           && 
        isset($_POST['book_title'])       &&
        isset($_POST['book_description']) &&
        isset($_POST['book_author'])      &&
        isset($_POST['book_category'])    &&
        isset($_FILES['book_cover'])      &&
        isset($_FILES['file'])            &&
        isset($_POST['current_cover'])    &&
        isset($_POST['current_file'] )) {
        /*
         Get data from POST request
         and store them in var 
         **/
         
        $id          = $_POST['book_id'];
		$title       = $_POST['book_title'];
		$description = $_POST['book_description'];
		$author      = $_POST['book_author'];
		$category    = $_POST['book_category'];

        /*
        Get current cover & current file
        from POST request and store  them in var
        **/
        $current_cover = $_POST['current_cover'];
        $current_file  = $_POST['current_file'];

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