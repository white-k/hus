<?php
	$db=new mysqli('localhost','ms','12345','msg');
	if(mysqli_connect_errno())
	{
		echo "Error:Could connect to dasedat.";
		exit;
	}
	$query="select * from chat";
	$results=$db->query($query);
	$num=$results->num_rows;

	for($i=0;$i<$num;$i++)
	{	
		$result=$results->fetch_assoc();
		$msg=$result['username']." ".$result['chatdata'].":".$result['message'];
		if($i==$num-1)
		echo $msg;
	}

?>