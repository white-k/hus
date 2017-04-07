<!DOCTYPE html>
<html>
<head>
	<title>HTTP streaming example two Connection</title>
</head>
<body>
	<?php
		$modified=filemtime('details.txt');
		$lastModified=$modified;

		clearstatcache();

		while(true)
		{
			?>
			<script type="text/javascript">
				parent.heartbeat();
			</script>
			<?php
		}
			ob_flush();
			flush();

			sleep(1);

			$lastModified=filemtime('details.txt');

			clearstatcache();

			if($modified!=$lastModified)
			{
				$output=date('h:i:s',$lastModified);
			}
			?>
			<script type="text/javascript">
				parent.modifiedAt("<?php echo $output; ?>");
				
			</script>

	<?php
			ob_flush();
			flush();
			$modified=$lastModified;

	?>
</body>
</html>