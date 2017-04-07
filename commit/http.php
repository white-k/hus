<!DOCTYPE html>
<html>
<head>
	<title>Http streaming</title>
</head>
<body>
		<?php
			$modified=filemtime("details.txt");
			$lastModified=$modified;

			clearstatcache();
			echo  $lastModified;
			while(true)
			{
				sleep(1);
				$lastModified=filemtime('details.txt');
				clearstatcache();
				
				if($modified!=$lastModified)
					{
						$output=date('h:i:s',$lastModified);
				
		?>
			<script type="text/javascript">
				document.title="File was modified at <?php echo $output;?>";

			</script>
			<?php

				ob_flush();
				flush();
				
				$modified=$lastModified;
				
			}
			}



		?>


</body>
</html>
