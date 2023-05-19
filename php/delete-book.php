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
         and store it in var 
         **/
        $id = $_GET['id'];
      

        #simple from Validation
        if(empty($id)){
            $em = "Error Occurred!";
            header("Location: ../admin.php?error=$em");
            exit;
        }else{
                #GET the Book from database
                $sql2  = "SELECT * FROM books  
                        WHERE id=?";
        $stmt2 = $conn-> prepare($sql2);
        $stmt2-> execute([$id]);

       if( $stmt2->rowCount() > 0){
   
            #DELETE the Book from database
            $sql  = "DELETE  FROM books 
                      WHERE id=?";
            $stmt = $conn-> prepare($sql);
            $res  = $stmt-> execute([ $id]);
            /*
                if there is no error while 
                inserting the data
            */ 
            if($res){
                # Success message
                $sm = "Successfully removed !";
                header("Location: ../admin.php?success=$sm");
                exit;
            }else{
                # Error message
                $em = "Unknown Error Occurred!";
                header("Location: ../admin.php?error=$em");
                exit;
            }

       }else{
           $em = "Error Occurred!";
           header("Location: ../admin.php?error=$em");
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