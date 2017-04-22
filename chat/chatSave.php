<?php
include('init_inc.php');
	session_start();
	
	$db=mysqli_connect(HOST,USER,A,DB);
	if(mysqli_connect_errno())
	{
		echo "the database not connect";
	}
	
	$oldCustomer=$_SESSION['user'];
	$mes=$_POST['name'];
	$_SESSION['user']=$mes;
	$value=$_POST['value'];
	
	if($mes==$oldCustomer)
	{	
		$query="insert into message(customer,message) values('".$mes."','".$value."')";
		$result=$db->query($query);
	
		if(!$result)
		{
			echo "not connect data";
		}else{
			echo "sucess postMessage";
		}
	}else{
		$query="truncate table message";
		$result=$db->query($query);
		if(!$result)
		{
			echo "not connect data";
		}else{
			echo "sucess postMessage";
		}
		$query="insert into message(customer,message) values('".$mes."','".$value."')";
		$result=$db->query($query);
		if(!$result)
		{
			echo "not connect data";
		}else{
			echo "sucess postMessage";
		}
	
	}

	













?>