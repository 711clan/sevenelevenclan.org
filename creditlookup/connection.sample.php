<?php

$con = mysql_connect('','','')
    or die ("Error connecting to MySQL server.") ;

$db = mysql_select_db('',$con)
    or die ("Error connecting to database.");