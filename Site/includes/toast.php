<style>
#successtoast {
  visibility: visible;
  min-width: 250px; 
  background-color: #53ff53; 
  color: #005300; 
  text-align: center; 
  border-radius: 2px; 
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 7%; 

  bottom: 30px;
  -webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
  
}

#errortoast {
  visibility: visible;
  min-width: 250px; 
  background-color: #ff4a4a; 
  color: #6c0000; 
  text-align: center; 
  border-radius: 2px; 
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 7%; 

  bottom: 30px;
  -webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
  
}

#warningtoast {
  visibility: visible;
  min-width: 250px; 
  background-color: #ffff4a; 
  color: #3e3e00; 
  text-align: center; 
  border-radius: 2px; 
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 7%; 
  bottom: 30px;
  -webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
  
}

</style>
<?php if($success){ ?>
<div id="successtoast"><b>Success</b> <?php echo htmlentities($success); ?></div>
<?php } ?>

<?php if($success2){ ?>
<div id="successtoast"><b>Success</b> <?php echo htmlentities($success2); ?></div>
<?php } ?>

<?php if($error){ ?>
<div id="errortoast"><b>Error</b> <?php echo htmlentities($error); ?></div>
<?php } ?>

<?php if($warning){ ?>
<div id="warningtoast"><b>Warning</b> <?php echo htmlentities($warning); ?></div>
<?php } ?>

