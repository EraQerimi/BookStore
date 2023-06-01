<?php 
session_start();

# if search key is not set or empty
if(!isset($_GET['key']) || empty($_GET['key']) ){
    header("Location: index.php");
    exit;
}
$key = $_GET['key'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
     <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">

    <!-- bootstrap js cdn-->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js "></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="conainer">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Online Book Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <?php if(isset($_SESSION['user_id'])){
                               ?> 
                               <a class="nav-link" href="admin.php">Admin</a>
                               <?php }else{?>
                                <a class="nav-link" href="login.php">Login</a>
                                <?php } ?>     
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        Search result for <b><?=$key?></b>

        <div class="d-flex">
            <div class="pdf-list d-flex flex-wrap" >
                <div class="card m-1" >
                    <img src="uploads/cover/book1.jpg" class="card-img-top" >
                </div>
                <div class="card-body" >
                    <h5 class="card-title" >Leaves of Grass</h5>
                    <p class="card-text">
                    "Leaves of Grass" by Walt Whitman is a poetic masterpiece that celebrates 
                    the beauty of nature and the power of the individual, inviting readers on 
                    a journey of self-discovery and connection. Whitman's words rustle with 
                    vitality, leaving a lasting impact on readers' hearts and minds.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>