<?php
	$name=$_GET["name"];
	$msg=$_GET["value"];
	$time=date("Y-m-d G:i:s");
	echo $time;
	@$db=new mysqli('localhost','ms','12345','msg');
	$query="insert into chat (username,chatdata,message) values('".$name."','".$time."','".$msg."')";
	if(mysqli_connect_errno())
	{
		echo "Error:Could connect to dasedat.";
		exit;
	}
	echo $query;	
	$result=$db->query($query);
	echo $result;
	if(!$result)
	{
		echo "the error";
	}
	echo $name.":".$msg;
?>