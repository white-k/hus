<?php
	header("Content-type:text/javascript");
	//获取文件时间；
	$modified=filemtime('details.txt');
	//将文件时间赋值给变量;
	$lastModified=$modified;
	//清除文件修改时间;
	clearstatcache();
	//检查每一项 看是否被修改;
	while(true)
	{
		echo(";hearbeat()");
		ob_flush();
		flush();
			//休眠1秒钟;
		sleep(1);
			//检查修改时间
		$lastmodified=filemtime("details.txt");
			//清除文件统计记录;
		clearstatcache();
			//根据先前时间进行比较
		if($modified!=$lastmodified)
		{
			$output=date('h:i:s',$lastmodified);
			echo(";modifiedAt(\"$output\")");
			ob_flush();
			flush();

			$modified=$lastmodified;
				//休眠1秒;
			sleep(1);
		}
	}














?>