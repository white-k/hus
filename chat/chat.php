<?php
	include_onece('init_inc.php');
	$id=$_POST['id'];
	$arr=array();
	if(!get_magic_quote_gpc())
	{
		$id=addslashes($id);
	}
	$db=mysqli_connect(HOST,USER,A,DB);
	if(mysqli_connect_errno())
	{
		echo "not connect database.";
	}
	$query="select * from message where customerId>".$id;
	$result=$db->query($query);
	while($row=$result->fetch_assoc())
	{
		array_push($arr,$row);
		
	}
	echo json_encode($arr);

?>
