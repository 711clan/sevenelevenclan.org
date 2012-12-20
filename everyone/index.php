<?php

	include 'connection.php';

	$con1 = mysql_connect($mysqlHost1,$mysqlUser1,$mysqlPass1)
		or die ("Error connecting to MySQL server.") ;
	
	$db1 = mysql_select_db($mysqlDB1,$con1)
		or die ("Error connecting to database.");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>7~11 Server User Look-Up</title>
<link href="css.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div id="body">
    <div id="head">
    <center><h1><a href="index.php">7~11 Server User Look-Up</a></h1>
    <p>This tool uses the PsychoStats and HLstatsX databases.</p></center>
    <BR />
	<form action="index.php" method="get">
        <input type="text" name="steamid" value="STEAM_0:X:XXXXX" onfocus="if(this.value == 'STEAM_0:X:XXXXX') {this.value = '';}" onblur="if (this.value == '') {this.value = 'STEAM_0:X:XXXXX';}" style="color:#999999; font-style:italic; " />
        <input type="submit" value="Search SteamID" />				
	</form>
    <br />
    <b>OR</b>
    <br />
    <br />
    <form name="form" action="index.php" method="get">
      <input type="text" name="username" />
      <input type="submit" name="submit" value="Search Name" />
    </form>
    <br />
    </div>
    <BR />
    <?php
		if ($_GET['steamid']) {
			
			$sql1 = "SELECT *
				FROM ps_plr
				INNER JOIN ps_plr_ids_name
				ON ps_plr.plrid = ps_plr_ids_name.plrid
				WHERE uniqueid = '" . mysql_real_escape_string($_GET['steamid']) . "'
				order by name";
				
			$result1 = mysql_query($sql1) or die(mysql_error());
			$num_rows1 = mysql_num_rows($result1);
	
			$con2 = mysql_connect($mysqlHost2,$mysqlUser2,$mysqlPass2)
				or die ("Error connecting to MySQL server.") ;
			
			$db2 = mysql_select_db($mysqlDB2,$con2)
				or die ("Error connecting to database.");
			
			if ($_GET['steamid'] == 'bot') {
				$sql2 = "SELECT name, uniqueId, game
					FROM  hlstats_PlayerUniqueIds
					INNER JOIN hlstats_PlayerNames ON hlstats_PlayerUniqueIds.playerId = hlstats_PlayerNames.playerId
					WHERE uniqueId LIKE  '%bot%'";
			}
			else {
				$sql2 = "SELECT *
					FROM hlstats_PlayerUniqueIds
					INNER JOIN hlstats_PlayerNames
					ON hlstats_PlayerUniqueIds.playerId = hlstats_PlayerNames.playerId
					WHERE uniqueId = '" . mysql_real_escape_string(str_replace("STEAM_0:","",$_GET['steamid'])) . "'
					order by name";
			}
			
			$result2 = mysql_query($sql2);
			$num_rows2 = mysql_num_rows($result2);
			
			$num_rowsT = $num_rows1 + $num_rows2;
			
			if ($num_rowsT == 1) {
				$ent = "entry";
			}
			else if ($num_rowsT > 1) {
				$ent = "entries";
			}
			else {
				$ent = "entries";
			}
			
			echo "Showing results for <b>" . $_GET['steamid'] . "</b><br /><br />";
			
			if ($num_rowsT < 1) {
				echo "<br /><b>No results found for <i>" . $_GET['steamid'] . "</i>.</b>";
			}
			
			else {
				echo "Found <b>" . $num_rowsT . "</b> " . $ent . ".<br /><br />";
				echo "<table><th>Name</th><th>SteamID</th>";
				
				while ($row1 = mysql_fetch_array($result1)) {
					echo "<tr><td><a href=\"?username=" . $row1['name'] . "\">" . $row1['name'] . "</a><a href='http://psychostats.sevenelevenclan.org/combined/player.php?id='" . $row1['ps_plr_ids_name.plrid'] . "'><img src=\"game_cs.png\" title=\"Counter Strike: 1.6\" /></a></td>
					<td><a href=\"?steamid=" . $row1['uniqueid'] . "\">" . $row1['uniqueid'] . "</a></td>";
				}
				
				while ($row2 = mysql_fetch_array($result2)) {
					switch ($row2['game']) {
						case 'tf':
							$img = '<a href="http://hlstatsx.711clan.net/hlstats.php?mode=playerinfo&player=206' . $row2['hlstats_PlayerUniqueIds.playerId'] . '"><img src="http://hlstatsx.711clan.net/hlstatsimg/games/tf/game.png" title="7~11 Extacy CASH MOD" /></a>';
							break;
						case 'tf2_2fort':
							$img = '<a href="http://hlstatsx.711clan.net/hlstats.php?mode=playerinfo&player=206' . $row2['hlstats_PlayerUniqueIds.playerId'] . '"><img src="http://hlstatsx.711clan.net/hlstatsimg/games/tf2_2fort/game.png" title="7~11 Valve Map Rotation" /></a>';
							break;
						case 'css':
							$img = '<a href="http://hlstatsx.711clan.net/hlstats.php?mode=playerinfo&player=206' . $row2['hlstats_PlayerUniqueIds.playerId'] . '"><img src="http://hlstatsx.711clan.net/hlstatsimg/games/css/game.png" title="7~11 GunGame CS:S" /></a>';
							break;
					}
					echo "<tr><td><a href=\"?username=" . $row2['name'] . "\">" . $row2['name'] . "</a>" . $img . "</td>
					<td><a href=\"?steamid=STEAM_0:" . $row2['uniqueId'] . "\">STEAM_0:" . $row2['uniqueId'] . "</a></td>";
					
				}
				
				echo "</table>";
			}
		}
		else if ($_GET['username']) {
			$var = @$_GET['username'] ;
			$trimmed = mysql_real_escape_string(trim($var));
			
			$sql1 = "SELECT *
			FROM ps_plr
			INNER JOIN ps_plr_ids_name
			ON ps_plr.plrid = ps_plr_ids_name.plrid
			WHERE name like '%" . $trimmed . "%'";
			
			switch ($_GET['sort_by']) {
				
				case 'name':					
					$sql1 .= ' order by name';
					break;
				
				case 'steamid':
					$sql1 .= ' order by uniqueid';
					break;
				case 'namer':					
					$sql1 .= ' order by name DESC';
					break;
				
				case 'steamidr':
					$sql1 .= ' order by uniqueid DESC';
					break;
				default:
					$sql1 .= ' order by name';
					break;
			}
			
			$result1 = mysql_query($sql1) or die(mysql_error());
			$num_rows1 = mysql_num_rows($result1);
	
			$con2 = mysql_connect($mysqlHost2,$mysqlUser2,$mysqlPass2)
				or die ("Error connecting to MySQL server.") ;
			
			$db2 = mysql_select_db($mysqlDB2,$con2)
				or die ("Error connecting to database.");
			
			$sql2 = "SELECT *
			FROM hlstats_PlayerUniqueIds
			INNER JOIN hlstats_PlayerNames
			ON hlstats_PlayerUniqueIds.playerId = hlstats_PlayerNames.playerId
			WHERE name like '%" . $trimmed . "%'";
			
			switch ($_GET['sort_by']) {
				
				case 'name':					
					$sql2 .= ' order by name';
					break;
				
				case 'steamid':
					$sql2 .= ' order by uniqueId';
					break;
				case 'namer':					
					$sql2 .= ' order by name DESC';
					break;
				
				case 'steamidr':
					$sql2 .= ' order by uniqueId DESC';
					break;
				default:
					$sql2 .= ' order by name';
					break;
			}
			
			$result2 = mysql_query($sql2);
			$num_rows2 = mysql_num_rows($result2);
			
			$num_rowsT = $num_rows1 + $num_rows2;
						
			if (!$num_rowsT) {
				echo "<br /><b>No results found for <i>" . $trimmed . "</i></b><br /><br />";
			}
			
			else {
				
				if ($num_rowsT  == 1) {
					$ent = "entry";
				}
				else if ($num_rowsT > 1) {
					$ent = "entries";
				}
				else {
					$ent = "entries";
				}
				
				echo "Showing results for <b>" . $var . "</b><br /><br />";
				
				echo "Found <b>" . $num_rowsT . "</b> " . $ent . ".<br /><br />";
				
				if ($_GET['sort_by'] == 'namer') {
					$orderName = 'name';
				} else {
					$orderName = 'namer';
				}
				
				if ($_GET['sort_by'] == 'steamidr') {
					$orderSteam = 'steamid';
				} else {
					$orderSteam = 'steamidr';
				}
					
				
				echo "
					<table>
						<th><a href=\"?username=" . $_GET['username'] . "&sort_by=" . $orderName . "\" >Name</a></th><th><a href=\"?username=" . $_GET['username'] . "&sort_by=" . $orderSteam . "\" >SteamID</a></th>";
				
				while ($row1 = mysql_fetch_array($result1)) {
					echo "<tr><td><a href=\"?username=" . $row1['name'] . "\">" . $row1['name'] . "</a><img src=\"game_cs.png\" title=\"Counter Strike: 1.6\" /></td>
					<td><a href=\"?steamid=" . $row1['uniqueid'] . "\">" . $row1['uniqueid'] . "</a></td>";
					
				}
				
				while ($row2 = mysql_fetch_array($result2)) {
					switch ($row2['game']) {
						case 'tf':
							$img = '<img src="http://hlstatsx.711clan.net/hlstatsimg/games/tf/game.png" title="7~11 Extacy CASH MOD" />';
							break;
						case 'tf2_2fort':
							$img = '<img src="http://hlstatsx.711clan.net/hlstatsimg/games/tf2_2fort/game.png" title="7~11 Valve Map Rotation" />';
							break;
						case 'css':
							$img = '<img src="http://hlstatsx.711clan.net/hlstatsimg/games/css/game.png" title="7~11 GunGame CS:S" />';
							break;
					}
					echo "<tr><td><a href=\"?username=" . $row2['name'] . "\">" . $row2['name'] . "</a>" .  $img . "</td>
					<td><a href=\"?steamid=STEAM_0:" . $row2['uniqueId'] . "\">STEAM_0:" . $row2['uniqueId'] . "</a></td>";
					
				}
				
				echo "</table><br /><br />";
				
			}
		}
		else {
			if ($_GET['steamid'] && $_GET['user']) {
			}
			else {
				echo "<b>Please enter a search term.</b>";
			}
		}
?>
</div>
</body>
</html>
