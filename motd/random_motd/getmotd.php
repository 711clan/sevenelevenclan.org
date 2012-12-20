<?php

	$list = file_get_contents('../random_motd/motds.txt');
	
	$quotes = array();
	
	$quotes = explode(";", $list);
	
	/*$i = 1;
	
	foreach ($quotes as $value) {
		
		echo $i++ . " - " . $value . "<br /><br />";
	}*/
	
	$count = count($quotes) - 2;
	
	$random = rand(0, $count);
	
	echo $quotes[$random];

?>