<?php require_once 'config.php';?>
<?php require_once HEAD; ?>
<?php if(!isset($_SESSION['email'])) header("location:index.php"); ?>
<?php $id = $_SESSION['id'];?>
<center><h3>My Product</h3></center>
<?php foreach($T_product as $row):?>
<?php if($row['user_id'] == $id):?>
<main>
    <div class="card" style="width: 15rem;">
      <img src="<?php echo $row['photo'];?>" class="card-img-top" alt="Logo">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['name']; ?></h5>
        <p class="card-text"><?php echo $row['price'].'$'; ?></p>
        <a href="http://localhost/Shopping/handler/delete_product.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
        <a href="http://localhost/Shopping/change_product.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
      </div>
    </div>
    </main>
<?php endif; ?>
<?php endforeach; ?>
<?php require_once FOOT; ?>
