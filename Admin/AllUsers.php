<?php
    require_once '../config.php';
    if(!isset($_SESSION['admin'])) header("location:../index.php");
    require_once '../'.HEAD;
?>
<div class="col-sm-12">
        <h3 class="text-center p-3 bg-success text-white">View All Users</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">mobile</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach($T_emails as $row){?>
                <tr class="text-center">
                    <td scope="row"> <?php echo $i;?> </td>
                    <td class="text-center"> <?php echo $row['FirstName'].' '.$row['LastName']; ?> </td>
                    <td class="text-center"> <?php echo $row['email'];?> </td>
                    <td class="text-center"> <?php echo $row['mobile'];?> </td>
                    <td class="text-center">
                        <a href="inc/delete_user.php?id=<?php echo $row['id'];?>" class="btn btn-danger delete" data-field="serv_id" data-id="" data-table="services" >Delete</a>
                    </td>
                </tr>
            <?php $i++; }?>
            </tbody>
        </table>
    </div>
<?php require_once '../'.FOOT;?>