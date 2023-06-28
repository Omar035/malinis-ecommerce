<?php

$serverName = 'xxxxxxxxxx';
$userName = 'xxxxxx';
$pwd = 'xxxxxx';
$dbName = 'xxxxxxx';

$conn = mysqli_connect($serverName, $userName, $pwd, $dbName);


if (!$conn) {
    header('Location: create-new-password.php?selector='.$selector.'&validator='.$validator.'&error=dbconnerr');
    exit();
}

