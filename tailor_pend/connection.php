<?php

$host = "localhst";
$username = "root";
$passwd = "";
$dbname = "tailor";

$link = mysqli_connect($host, $username, $passwd, $dbname) or die(mysqli_errno());