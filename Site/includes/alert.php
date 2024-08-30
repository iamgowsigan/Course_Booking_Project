<div class="container">
<div class="container"></div>	

<?php if($info){ ?>
<div class="info-msg">
  <i class="fa fa-info-circle" style="color:#0000ff"></i>
  <b><?php echo $mylan['Success']; ?></b> <?php echo htmlentities($info); ?>
</div>
<?php } ?>

<?php if($success){ ?>
<div class="success-msg">
  <i class="fa fa-check" style="color:#008000"></i>
  <b><?php echo $mylan['Success']; ?></b> <?php echo htmlentities($success); ?>
</div>
<?php } ?>

<?php if($warning){ ?>
<div class="warning-msg">
  <i class="fa fa-warning" style="color:#ebce05"></i>
  <b><?php echo $mylan['Warning']; ?></b> <?php echo htmlentities($warning); ?>
</div>
<?php } ?>

<?php if($error){ ?>
<div class="error-msg">
  <i class="fa fa-times-circle" style="color:#fc0303"></i>
 <b><?php echo $mylan['Error']; ?></b> <?php echo htmlentities($error); ?>
</div>
<?php } ?>

</div>
