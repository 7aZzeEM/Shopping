<?php require_once '../config.php'; ?>
<?php require_once '../'.HEAD; ?>
<?php if(!isset($_SESSION['admin'])) header("location:login.php");?>
<center>
<main>
<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Products</h5>
        <p class="card-text">All products on the site visit the main page. </p>
        <a href="http://localhost/Shopping/Admin/AllProducts.php" class="btn btn-primary"> <?php echo count($T_product); ?> </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Users</h5>
        <p class="card-text">All Users on the site visit the main page. </p>
        <a href="http://localhost/Shopping/Admin/AllUsers.php" class="btn btn-primary"> <?php echo count($T_emails); ?> </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Admins</h5>
        <p class="card-text">All Admins on the site visit the main page. </p>
        <a href="http://localhost/Shopping/Admin/admins/ShowAdmin.php" class="btn btn-primary"> <?php echo count($T_admin); ?> </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Orders</h5>
        <p class="card-text">All Orders on the site visit the main page. </p>
        <a href="http://localhost/Shopping/Admin/orders.php" class="btn btn-primary"> <?php echo count($T_orders); ?> </a>
      </div>
    </div>
  </div>
  </main>
  </center>
<?php require_once '../'.FOOT; ?>