<?php
	include_onece('init_inc.php');
	session_start();
	$db=mysqli_connect(HOST,USER,A,DB);
	if(mysqli_connect_errno())
	{
		echo "not connect database.";
	}
	$query="select * from message where customer='".$_SESSION['user']."'";

















?>
