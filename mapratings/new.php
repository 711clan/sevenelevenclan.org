<?php

ini_set("display_errors", 1);

include 'connection.php';
define('MR_DBNAME', 'maprate3');

$servers = array(
    'vsh' => array(
        'name' => '7~11 Vs Saxton Hale | HLstatsX',
        'table' => 'map_ratings'
    )
);

try {
    $db = new PDO('mysql:host=' . MR_DBHOST . ';dbname=' . MR_DBNAME, MR_DBUSER, MR_DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    print "SQL Error: " . $e->getMessage() . "<br/>";
    exit;
}

$server = false;
if (isset($_GET['server']) && isset($servers[$_GET['server']])) {
    $server = $servers[$_GET['server']];
}

?><html>
    <head>
        <title><?php if ($server): echo $server['name'] ?> - <?php endif ?>Map Ratings</title>
        <style type="text/css">
            body {
                font-family: Arial;
                width: 800px;
                margin: 10px auto;
            }
            table {
                border-top:1px solid #e5eff8;
                border-right:1px solid #e5eff8;
                border-collapse:collapse;
                width: 100%;
                margin: 20px auto;
                font-size: 12px;
            }

            th {
                cursor: pointer;
                background:#f4f9fe;
                text-align:center;
                color:#66a3d3;
            }

            td, th {
                color: #3F4F5C;
                border-bottom:1px solid #e5eff8;
                border-left:1px solid #e5eff8;
                padding: 10px;
            }

            tr:nth-child(odd) td {
                background:#f7fbff;
            }
        </style>
        <script type="text/javascript" src="http://pd-cdn.net/js/jquery.1355975942.js"></script>
        <script type="text/javascript" src="http://pd-cdn.net/js/jquery.tablesorter.1355975942.js"></script>
        <script>
            $(document).ready(function() { $('table').tablesorter(); });
        </script>
    </head>
    <body>
        <h3>Select a server:</h3>
        <ul>
            <?php foreach($servers as $link => $serv): ?>
            <li><a href="?server=<?php echo $link ?>"><?php echo $serv['name'] ?></a></li>
            <?php endforeach ?>
        </ul>
        <?php
            if ($server):
        ?>
        <h1><?php echo $server['name'] ?></h1>
        <?php
            foreach (array(
                'All Time' => '1 = 1',
                'Last Week' => 'rated > NOW() - INTERVAL 1 WEEK',
                'Last Day' => 'rated > NOW() - INTERVAL 1 DAY'
            ) as $name => $where):
        ?>
        <h2><?php echo $name ?></h2>
        <table>
            <tr>
                <thead>
                    <th>Number of Ratings</th>
                    <th>Average Rating</th>
                    <th>Map</th>
                </thead>
            </tr>
            <?php
                $stmt = $db->query("SELECT
                    COUNT(*) votes, ROUND(AVG(rating), 1) avg, map
                    FROM map_ratings
                    WHERE $where
                    GROUP BY map
                    ORDER BY avg DESC, votes DESC
                ");
                while ($row = $stmt->fetch()):
            ?>
            <tr>
                <tbody>
                    <td><?php echo $row['votes'] ?></td>
                    <td><?php echo $row['avg'] ?></td>
                    <td><?php echo $row['map'] ?></td>
                </tbody>
            </tr>
            <?php endwhile ?>
        </table>
        <?php endforeach; endif ?>
    </body>
</html>