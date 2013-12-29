<?php

	if(!file_exists("bodem.txt"))
		{
			$bodem = fopen("bodem.txt","w+");
			fwrite($bodem,"1");
			echo "Số người truy cập <br/> 1";
		}
		else
		{
			$bodem = fopen("bodem.txt","r");
			$dem = (int)fgets($bodem);
			$dem++;
			fclose($bodem);
			$bodem = fopen("bodem.txt","w+");
			fwrite($bodem,$dem);
			fclose($bodem);
			echo "<font size=4> Số người truy cập<br/> $dem"."</font>";
		}	
?>
