<?php
session_start();

#if the admin is logged in
if(isset($_SESSION['user_id']) &&
   isset($_SESSION['user_email'])){

    include "db_conn.php";
 
    include "php/func-book.php";
    $books = get_all_books($conn);

    include "php/func-author.php";
    $authors = get_all_author($conn);

    print_r($authors);


   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
     <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">

    <!-- bootstrap js cdn-->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js "></script>
</head>
<body>
    <div class="conainer">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="admin.php">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add Book</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add Author</a>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if($books == 0){ ?>
                empty 
       <?php } else { ?>
    <h4>All Books</h4>
    <table class="table table-bordered shadow">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book) {?>
            <tr>  
            <td>1</td>
            <td><?=$book['title']?></td>
            <td><?=$book['author_id']?></td>
            <td><?=$book['description']?> </td>
            <td><?=$book['category_id']?></td>
            <td>
                
                <a href="#"
                   class="btn btn-warning">
                   Edit</a>

                <a href="#"
                   class="btn btn-danger">
                   Delete</a>
            </td>
        </tr>
        <?php }  ?>
        </tbody>
    </table>
    <?php } ?>
    </div>
</body>
</html>

<?php }else{
    header("Location: login.php");
    exit;
} ?>