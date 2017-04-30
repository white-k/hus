<?php
include('init_inc.php');
	
	$db=mysqli_connect(HOST,USER,A,DB);
	if(mysqli_connect_errno())
	{
		echo "the database not connect";
	}
	
	
	$mes=$_POST['name'];
	
	$value=$_POST['value'];
	
	
	
	$query="insert into message(customer,message,date) values('".$mes."','".$value."',NOW())";
	$result=$db->query($query);

	if(!$result)
	{
		echo "not connect data";
	}else{
		echo "sucess postMessage";
	}




?>
