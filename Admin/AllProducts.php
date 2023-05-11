<?php
    require_once '../config.php';
    require_once '../'.HEAD;
?>
<?php if(!isset($_SESSION['admin'])) header("location:../index.php"); ?>
<center>
    <br><h3>All Products</h3>
    <?php foreach($T_product as $row){?>
    <main>
    <div class="card" style="width: 15rem;">
      <img src="<?php echo '../'.$row['photo']; ?>" class="card-img-top" alt="Logo">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['name']; ?></h5>
        <p class="card-text"><?php echo $row['price'].'$'; ?></p>
        <a href="inc/delete_product.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
      </div>
    </div>
    </main>
    <?php }?>
</center>
<?php require_once '../'.FOOT; ?>