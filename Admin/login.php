<?php require_once '../config.php'; ?>
<?php require_once '../'.SMS;?>
<?php
    if(isset($_POST['submit'])){
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
        if(!empty($email) || !empty($password)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                foreach($T_admin as $row):
                    if($row['email'] == $email && $row['password'] == $password):
                        $_SESSION['admin'] = $email;
                        $_SESSION['id_admin'] = $row['id'];
                        header("location:index.php");
                    endif;
                endforeach;
                $_SESSION['Error'] = "Not Found";
            }else $_SESSION['Error'] = "This Is Not Email";
        }else $_SESSION['Error'] = "Please Type All Data";
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin Shopping</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-12 ">
                <h1 class="text-center display-4 border my-5 p-2"> Login Admin</h1>
            </div>
            <?php
                if(isset($_SESSION['Error'])){
                    ErrorMessage($_SESSION['Error']);
                    unset($_SESSION['Error']);
                }
            ?>
            <div class="col-sm-6 mx-auto">
                <div class="border p-5 my-3">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-block btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>