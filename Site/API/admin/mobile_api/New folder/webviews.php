<?php
session_start();
include 'DatabaseConfig.php';
error_reporting(0);


$newsid = $_GET['id'];


    $query = mysqli_query($conn, "Select * from news WHERE n_id='$newsid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) {	

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<meta property="og:image" content="http://ia.media-imdb.com/rock.jpg"/>
<link rel="image_src" 
      type="image/jpeg" 
      href="../mec/<?php echo htmlentities($row['img1']); ?>" />

<head>
    <title>BigNews - <?php echo htmlentities($row['title']); ?></title>
    <?php include 'includes/head.php';?>

</head>



<body>

	<?php if(strcmp($row['link1'], '') != 0){ 
	echo $row['link1']; }
	
	?>
	<br><br>
	<?php if(strcmp($row['link2'], '') != 0){ 
	echo $row['link2']; }
	
	?>


	


<?php }?>



</body>

</html>

