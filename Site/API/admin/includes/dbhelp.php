<?php

function Insertdata($table,$field,$data){

	$field_values= implode(',',$field);
    $data_values=implode(',',$data);	
	
	//$query = mysqli_query($con, "insert into ".$table." ( ".$field_values." ) values( ".$data_values." )");
	$query = mysqli_query($con, "insert into help (detail) value ('vjhvjhvjhvhv')");
    if ($query) {
         $msg = "User Added";
       } else {
            $error = "Something Wrong";
        }
					
 }

?>