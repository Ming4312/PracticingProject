<?php
    $hostname = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbName = "test";
    $dbport = 3306;
    $con = mysql_connect($hostname,$username,$password) OR die('Unable to connect to database: ' . mysql_error() );
    mysql_select_db("$dbName") or die('Unable to select database');
?>