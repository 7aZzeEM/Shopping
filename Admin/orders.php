<?php require_once '../config.php'; ?>
<?php require_once '../'.HEAD;?>
<?php require_once '../'.SMS;?>
<div class="col-sm-12">
<?php
    if(isset($_SESSION['Success'])){
        SuccessMessage($_SESSION['Success']);
        unset($_SESSION['Success']);
    }
?>
        <h3 class="text-center p-3 bg-success text-white">All Orders</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Name Owner</th>
                    <th scope="col">Mobile Owner</th>
                    <th scope="col">Buyer,s Name</th>
                    <th scope="col">Buyer,s Mobile</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach($T_orders as $row){?>
                <tr class="text-center">
                    <td scope="row"> <?php echo $i; ?> </td>
                    <td class="text-center"> <?php echo $row['title']; ?> </td>
                    <td class="text-center"> <?php echo $row['price']; ?> </td>
                    <td class="text-center"> <?php echo $row['owner_name']; ?> </td>
                    <td class="text-center"> <?php echo $row['owner_mobile']; ?> </td>
                    <td class="text-center"> <?php echo $row['buyers_name']; ?> </td>
                    <td class="text-center"> <?php echo $row['buyers_mobile']; ?> </td>
                    <td class="text-center">
                        <a href="http://localhost/Shopping/handler/delete_order.php?id=<?php echo $row['id'];?>" class="btn btn-danger delete" data-field="serv_id" data-id="" data-table="services" >Delete</a>
                        <a href="http://localhost/Shopping/handler/done.php?title=<?php echo $row['title'];?>&price=<?php echo $row['price'];?>&owner=<?php echo $row['owner_name'];?>&id=<?php echo $row['id'];?>" class="btn btn-success delete" data-field="serv_id" data-id="" data-table="services" >Done</a>
                    </td>
                </tr>
            <?php $i++; }?>
            </tbody>
        </table>
    </div>
<?php require_once '../'.FOOT;?>