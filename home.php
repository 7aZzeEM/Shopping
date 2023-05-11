<?php require_once 'config.php';?>
<?php require_once HEAD; ?>
<?php require_once SMS;?>
<?php if(!isset($_SESSION['email'])) header("location:index.php"); ?>
<?php if(isset($_SESSION['admin'])) header("location:Admin/index.php"); ?>
<?php $id = $_SESSION['id'];?>
<?php
    if(isset($_SESSION['Success'])){
        SuccessMessage($_SESSION['Success']);
        unset($_SESSION['Success']);
    }
?>
<center>
    <br><h3>All Products</h3>
<?php if(count($T_product) == NULL){
        ErrorMessage("No Products Now");
    }
?>
<?php foreach($T_product as $row):?>
    <main>
    <div class="card" style="width: 15rem;">
      <img src="<?php echo $row['photo']; ?>" class="card-img-top" alt="Logo">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['name']; ?></h5>
        <p class="card-text"><?php echo $row['price']+100 .'$'; ?></p>
        <a href="http://localhost/Shopping/handler/buy.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Buy</a>
      </div>
    </div>
    </main>
<?php endforeach; ?>
</center>
<?php require_once FOOT; ?>