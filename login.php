<?php require_once 'config.php'; ?>
<?php require_once HEAD; ?>
<?php require_once SMS; ?>
<?php if(isset($_SESSION['email'])) header("location:home.php");?>
<?php if(isset($_SESSION['admin'])) header("location:Admin/index.php");?>
<div class="container">
        <div class="row">
            <div class="col-12 ">
                <h1 class="text-center display-4 border my-5 p-2"> Login</h1>
            </div>
            <?php if(isset($_SESSION['Error'])){
                $value = $_SESSION['Error'];
                ErrorMessage($value);
                unset($_SESSION['Error']);
            }
            ?>
            <div class="col-sm-6 mx-auto">
                <div class="border p-5 my-3">
                    <form action="handler/login.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email">
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
<?php require_once FOOT; ?>
