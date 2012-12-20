<?php include 'connection.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>7~11 Credit Look-Up</title>
<link href="css.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div id="body">
    <div id="head">
    <center><h1><a href="index.php">7~11 Credit Look-Up</a></h1></center>
    <BR />
    <form action="index.php" method="get">
        <input type="text" name="steamid" value="STEAM_0:X:XXXXX" onfocus="if(this.value == 'STEAM_0:X:XXXXX') {this.value = '';}" onblur="if (this.value == '') {this.value = 'STEAM_0:X:XXXXX';}" style="color:#999999; font-style:italic; " />
        <input type="submit" name="submit" value="Search SteamID" />                
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
        if ($_GET['steamid'] == 'STEAM_0:1:10645381') {
            echo "<center>stevether has and always will have more credits that you can ever imagine.<br />No numerical value can be assigned to his awesome credit quantity.</center>";
        }
        else if ($_GET['steamid']) {
            
            $sql = "SELECT *
            FROM contime
            WHERE authid = '" . mysql_real_escape_string($_GET['steamid']) . "'";
            
            $result = mysql_query($sql);
            $num_rows = mysql_num_rows($result);
            
            if ($num_rows == 1) {
                $ent = "entry";
            }
            else if ($num_rows > 1) {
                $ent = "entries";
            }
            else {
                $ent = "entries";
            }
            
            if ($num_rows != 1) {
                echo "<br /><b>No results found for <i>" . $_GET['steamid'] . "</i>.</b>";
            }
            
            else {
                /*$sql2 = "SELECT *
                FROM contime";
                
                $result2 = mysql_query($sql2);
                $num_rows2 = mysql_num_rows($result2);*/
                echo "Found <b>" . $num_rows . "</b> " . $ent . ".<br /><br />";
                echo "<table><th>Name</th><th>SteamID</th><th>Credits</th><th>Last Seen</th>";
                
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr><td>" . $row['name'] . "</td>
                    <td>" . $row['authid'] . "</td>
                    <td>" . round($row['time_all'] / 300 , 0) . "</td>
                    <td>" . $row['time_last'] . "</td></tr>";
                }
                
                echo "</table>";
            }
        }
        else if ($_GET['username']) {
            $var = @$_GET['username'] ;
            $trimmed = mysql_real_escape_string(trim($var));
                
            $numLimit = 10;
            
            $numLimit = ($_GET['limit'] ? $_GET['limit'] : $numLimit);
            
            $sqlAll = "SELECT *
            FROM contime
            WHERE name like '%" . $trimmed . "%'";
            
            $qAll = mysql_query($sqlAll);
            
            $numAll = mysql_num_rows($qAll);
            
            $sql = "SELECT *
            FROM contime
            WHERE name like '%" . $trimmed . "%'
            order by name
    LIMIT " . ($_GET['start'] ? $_GET['start'] : 0) . ", $numLimit";
            
            switch ($_GET['sort_by']) {
                case 'name':
                    $sql = "SELECT *
                    FROM contime
                    WHERE name like '%" . mysql_real_escape_string($trimmed) . "%'
                    order by name
    LIMIT " . ($_GET['start'] ? $_GET['start'] : 0) . ", $numLimit";
                    break;
                case 'steamid':
                    $sql = "SELECT *
                    FROM contime
                    WHERE name like '%" . mysql_real_escape_string($trimmed) . "%'
                    order by authid
    LIMIT " . ($_GET['start'] ? $_GET['start'] : 0) . ", $numLimit";
                    break;
                case 'credits':
                    $sql = "SELECT *
                    FROM contime
                    WHERE name like '%" . mysql_real_escape_string($trimmed) . "%'
                    order by time_all DESC
    LIMIT " . ($_GET['start'] ? $_GET['start'] : 0) . ", $numLimit";
                    break;
                case 'last_time':
                    $sql = "SELECT *
                    FROM contime
                    WHERE name like '%" . mysql_real_escape_string($trimmed) . "%'
                    order by time_last DESC
    LIMIT " . ($_GET['start'] ? $_GET['start'] : 0) . ", $numLimit";
                    break;
                default:
                    $sql = "SELECT *
                    FROM contime
                    WHERE name like '%" . mysql_real_escape_string($trimmed) . "%'
                    order by name
    LIMIT " . ($_GET['start'] ? $_GET['start'] : 0) . ", $numLimit";
                    break;
            }
            
            $result = mysql_query($sql);
            $num_rows = mysql_num_rows($result);
                        
            if (!$num_rows) {
                echo "<br /><b>No results found for <i>" . $trimmed . "</i>.</b>*<br /><br />";
                
                echo "<i>*Note: Name search only checks the last name used.  For an exact search, use steamID.</i>";
            }
            
            else {
                /*$sql2 = "SELECT *
                FROM contime";
                $result2 = mysql_query($sql2);
                $num_rows2 = mysql_num_rows($result2);*/
                
                if ($num_rows == 1) {
                    $ent = "entry";
                }
                else if ($num_rows > 1) {
                    $ent = "entries";
                }
                else {
                    $ent = "entries";
                }
                
                echo "Showing results for <b>" . $var . "</b>.*<br /><br />";
                
                echo "Found <b>" . $numAll . "</b> " . $ent . ".<br /><br /><div style=\"margin-bottom: 30px\">";
                
                echo ($_GET['start'] && $_GET['start'] - $numLimit > 0 ? "<a class=\"left\" href=\"?username={$_GET['username']}" . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" . ($_GET['start'] - $numLimit) . "\">&laquo; Prev</a>" : ($_GET['start'] && $_GET['start'] - $numLimit <= 0 ? "<a class=\"left\" href=\"?username={$_GET['username']}" . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=0\">&laquo; Prev</a>" : ""));
            echo ($_GET['start'] && $_GET['start'] + $numLimit < $numAll ? "<a class=\"right\" href=\"?username={$_GET['username']}" . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" . ($_GET['start'] + $numLimit) . "\">Next &raquo</a>" : ($_GET['start'] && $_GET['start'] + $numLimit >= $numAll ? "" : ($_GET['start'] ? "<a class=\"right\" href=\"?username={$_GET['username']}" . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" . ($_GET['start'] + $numLimit) . "\">Next &raquo</a>" : ($numLimit >= $numAll ? "" : "<a class=\"right\" href=\"?username={$_GET['username']}" . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" . ($_GET['start'] + $numLimit) . "\">Next &raquo</a>"))));
                
                echo "
                    </div><table>
                        <th>
                            <a href=\"?username=" . $_GET['username'] . "&sort_by=name\" >Name</a>
                        </th>
                        <th>
                            <a href=\"?username=" . $_GET['username'] . "&sort_by=steamid\" >SteamID</a>
                        </th>
                        <th>
                            <a href=\"?username=" . $_GET['username'] . "&sort_by=credits\" >Credits</a>
                        </th>
                        <th>
                            <a href=\"?username=" . $_GET['username'] . "&sort_by=last_time\" >Last Seen</a>
                        </th>";
                
                while ($row = mysql_fetch_array($result)) {
                    $creds = round($row['time_all'] / 300 , 0);
                    if ($row['authid'] == 'STEAM_0:1:10645381') {
                        $creds = "∞";
                    } 
                    echo "<tr><td>" . $row['name'] . "</td>
                    <td>" . $row['authid'] . "</td>
                    <td>" . $creds . "</td>
                    <td>" . $row['time_last'] . "</td></tr>";
                    
                }
                
                echo "</table><br /><br />";
                
                echo ($_GET['start'] && $_GET['start'] - $numLimit > 0 ? "<a class=\"left\" href=\"?username={$_GET['username']}" . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" . ($_GET['start'] - $numLimit) . "\">&laquo; Prev</a>" : ($_GET['start'] && $_GET['start'] - $numLimit <= 0 ? "<a class=\"left\" href=\"?username={$_GET['username']}" . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=0\">&laquo; Prev</a>" : ""));
            echo ($_GET['start'] && $_GET['start'] + $numLimit < $numAll 
            ? "<a class=\"right\" href=\"?username={$_GET['username']}" 
                . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") 
                . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" 
                . ($_GET['start'] + $numLimit) . "\">Next &raquo</a>" 
            : 
                ($_GET['start'] && $_GET['start'] + $numLimit >= $numAll 
                ? "" 
                : 
                    ($_GET['start'] 
                    ? "<a class=\"right\" href=\"?username={$_GET['username']}" 
                        . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") 
                        . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" 
                        . ($_GET['start'] + $numLimit) . "\">Next &raquo</a>" 
                    : 
                        ($numLimit >= $numAll 
                        ? "" 
                        : "<a class=\"right\" href=\"?username={$_GET['username']}" 
                            . ($_GET['sort_by'] ? "&sort_by={$_GET['sort_by']}" : "") 
                            . ($_GET['limit'] ? "&limit={$_GET['limit']}" : "") . "&start=" 
                            . ($_GET['start'] + $numLimit) . "\">Next &raquo</a>"
                        )
                    )
                )
            );
                
                echo "<br /><br /><i>*Note: Name search only checks the last name used.  For an exact search, use steamID.</i><br /><br />";
                
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
