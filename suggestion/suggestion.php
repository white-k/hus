<?php
	header("content-type:text/html;charset=utf-8");
	$text=$_GET['t'];
	
	$sSuggestions=array();
	
	
		$sQuery="select Name from statesandprovinces where Name like '".$text."%' order by Name ASC Limit 0,5";
		$db=new mysqli("localhost","ajax","ajax123","ifram");
		if(mysqli_connect_errno())
		{
			echo "Error";
		}
		$result=$db->query($sQuery);

		if($result)
		{
			while($value=$result->fetch_assoc())
			{
				array_push($sSuggestions,$value['Name']);
				
			}
		}else{
			echo "query the error";
		}

		$result->free();
		$db->close();



	echo json_encode($sSuggestions);







?>