<?php function ErrorMessage($sms){?>
    <div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="alert alert-danger text-center"> <?php echo $sms; ?> </h3>
    </div>
<?php }?>
<?php function SuccessMessage($sms){?>
    <div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="alert alert-success text-center"> <?php echo $sms; ?> </h3>
    </div>
<?php }?>