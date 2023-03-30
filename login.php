<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
     <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">

    <!-- bootstrap js cdn-->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js "></script>
</head>
<body>
    <div class="d-flex justify-content-center align-item-center"
         style="min-height: 100vh;">
        <form class="p-5 rounded shadow" 
         style="max-width: 30rem ; width: 100% " 
         method="POST"
         action="php/auth.php">

         <h1 class="text-center display-4 pb-5" >LOGIN</h1>
         <?php if(isset($_GET['error'])) {?>
         <div class="alert alert-danger" role="alert">
            <?=htmlspecialchars($_GET['error']);?>
            
        </div>
        <?php } ?>
        <div class="mb-3">
            <label for="exampleInputEmail1"
                 class="form-label">Email address</label>
            <input type="email" 
                    class="form-control"
                    name="email"
                    id="exampleInputEmail1" 
                    aria-describedby="emailHelp">
           
        <div class="mb-3">
            <label for="exampleInputPassword1" 
            class="form-label">Password</label>
            <input type="password" 
            name="password"
            class="form-control" 
            id="exampleInputPassword1">
        </div>
    
        <button type="submit" 
        class="btn btn-primary">
        Submit</button>
        <a href="index.php">Store</a>

        
    </form>
    </div>
        
</body>
</html>