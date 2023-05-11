<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>SHOPPING</title>
    <style>
            input{ padding:4px;border:2px solid none;text-align:center;font-size:17px;font-family: 'Tajawal', sans-serif; }
            aside{ text-align:center;width:300px;float:left;border:1px solid black;padding:10px;font-size:20px;background-color:#53543533;color:black; }
            aside button{ width:;190px;padding:8px;margin-top:7px;font-size:17px;font-family: 'Tajawal', sans-serif;font-weight:bold; }
            .card{float: right;margin-top: 20px;margin-left: 10px;margin-right: 10px;}
            .card img{width: 100%;height: 200px;}
            main{
                width: 60%;
            }
        </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if(!isset($_SESSION['email']) && !isset($_SESSION['admin'])){?>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <?php }elseif(isset($_SESSION['email'])){?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo HOME; ?>">Home </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Shopping/my_products.php">My Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Shopping/add_product.php">Add Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="http://localhost/Shopping/setting/change_name.php">Change Name</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/setting/change_email.php">Change Email</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/setting/change_password.php">Change Password</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/setting/change_mobile.php">Change Mobile</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Shopping/handler/logout.php">Logout</a>
                </li>
                <?php }elseif(isset($_SESSION['admin'])){ ?>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Shopping/Admin/index.php">Home </span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Shopping/Admin/AllProducts.php">All Products</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Shopping/Admin/AllUsers.php">All Users</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admins
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="http://localhost/Shopping/Admin/admins/ShowAdmin.php">Show Admins</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/Admin/admins/AddAdmin.php">Add Admin</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Shopping/Admin/orders.php">Orders</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="http://localhost/Shopping/Admin/setting/change_name.php">Change Name</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/Admin/setting/change_email.php">Change Email</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/Admin/setting/change_password.php">Change Password</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/Admin/setting/change_mobile.php">Change Mobile</a>
                        <a class="dropdown-item" href="http://localhost/Shopping/Admin/setting/new_permission.php">Admin Permission</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Shopping/Admin/logout.php">Logout</span></a>
                </li>
                <?php }?>
            </ul>
        </div>
    </nav>