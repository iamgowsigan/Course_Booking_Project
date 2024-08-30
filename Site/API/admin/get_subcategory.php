<?php
include('includes/config.php');
$id=$_POST['catid'];

$query=mysqli_query($con,"SELECT * FROM subcategory WHERE cat='$id'");
$rowcount = mysqli_num_rows($query);
if ($rowcount == 0) {
?>
<option value="">No Category Found</option>
<?php }else{ ?>
	<option value="">Select Category</option><?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  
  <option value="<?php echo htmlentities($row['sub_id']); ?>"><?php echo htmlentities($row['sub_name']); ?></option>
  <?php
 }
}

?>