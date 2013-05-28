<?php

include 'connection.php';
define('MR_DBNAME', 'maprate3');

$servers = array(
    'vsh' => array(
        'name' => '7~11 Vs Saxton Hale | HLstatsX'
        'table' => 'map_ratings'
    )
);

try {
    $db = new PDO('mysql:host=' . MR_DBNAME . ';dbname=' . MR_DBNAME, MR_DBUSER, MR_DBPASS);
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
        <title><?php if ($server): echo $server['title'] ?> - <?php endif ?>Map Ratings</title>
    </head>
    <body>
        <h3>Select a server:</h3>
        <ul>
            <?php foreach($servers as $link => $serv): ?>
            <li><a href="?server=<?php echo $link ?>"><?php echo $serv['name'] ?></li>
            <?php endif ?>
        </ul>
        <?php
            if ($server)
            foreach (array(
                'All Time' => '1 = 1',
                'Last Week' => 'rated > NOW() - INTERVAL 1 WEEK',
                'Last Day' => 'rated > NOW() - INTERVAL 1 DAY'
            ) as $name => $where):
        ?>
        <h4><?php echo $name ?></h4>
        <table>
            <tr>
                <th>Number of Ratings</th>
                <th>Average Rating</th>
                <th>Map</th>
            </tr>
            <?php
                $stmt = $db->query("SELECT
                    COUNT(*) votes, ROUND(AVG(rating), 1) avg, map
                    FROM map_ratings
                    WHERE $where
                    GROUP BY map
                    ORDER BY avg DESC, votes DESC
                ");
                foreach ($stmt->fetchRow() as $row):
            ?>
            <tr>
                <td><?php echo $row['votes'] ?></td>
                <td><?php echo $row['avg'] ?></td>
                <td><?php echo $row['map'] ?></td>
            </tr>
            <?php endforeach ?>
        </table>
        <?php endforeach ?>
    </body>
</html>