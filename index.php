<?php require_once 'config.php'; ?>
<?php require_once HEAD; ?>
<?php if(isset($_SESSION['email'])) header("location:home.php");?>
<?php if(isset($_SESSION['admin'])) header("location:Admin/index.php");?>
<div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4 border p-3 my-5 "> Login For Shopping </h1>
            </div>
        </div>
    </div>
    <div class="coontainer">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4 border p-3 my-3 "> <img class="text-center display-4 border p-3 my-5" src="<?php echo IMG.'download.jpg'; ?>"> </h1>
            </div>
        </div>
    </div>
<?php require_once FOOT; ?>
<?php require_once FOOT; ?>