<?php
session_start();

#if the admin is logged in
if(isset($_SESSION['user_id']) &&
   isset($_SESSION['user_email'])){

        #Database connection file
        include "../db_conn.php";

        #Validation helper function
        include "func-validation.php";
  
    /**if all Input 
       fields are filled
       **/
     if (isset($_POST['book_title']) &&
         isset($_POST['book_description'])&&
         isset($_POST['book_author'])&&
         isset($_POST['book_category'])&&
         isset($_FILES['book_cover'])&&
         isset($_FILES['file'])){
        /*
         Get data from POST request
         and store them in var 
         **/
        $title = $_POST['book_title'];
        $description = $_POST['book_description'];
        $author = $_POST['book_author'];
        $category = $_POST['book_category'];

        #making URL data format
        $user_input = 'title='.$title.'&category='.$category.'&desc='.$description;
        
        #simple form Validation

        $text = "Book title";
        $location = "../add-book.php";
        $ms = "error";
        is_empty($title, $text, $location, $ms, $user_input);

        $text = "Book description";
        $location = "../add-book.php";
        $ms = "error";
        is_empty($description, $text, $location, $ms, $user_input);

        $text = "Book author";
        $location = "../add-book.php";
        $ms = "error";
        is_empty($author, $text, $location, $ms, $user_input);

        $text = "Book category";
        $location = "../add-book.php";
        $ms = "error";
        is_empty($category, $text, $location, $ms, $user_input);
      
   
}else{
    header("Location: ../admin.php");
    exit;
}

}else{
    header("Location: ../login.php");
    exit;
} 