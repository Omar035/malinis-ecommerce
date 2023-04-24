<?php

$serverName = 'sql308.byethost33.com';
$userName = 'b33_28842850';
$pwd = 'Omar2000';
$dbName = 'b33_28842850_malinis';

$conn = mysqli_connect($serverName, $userName, $pwd, $dbName);


if (!$conn) {
    header('Location: create-new-password.php?selector='.$selector.'&validator='.$validator.'&error=dbconnerr');
    exit();
}

