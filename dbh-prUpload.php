<?php

$serverName = 'sql308.byethost33.com';
$userName = 'b33_28842850';
$pwd = 'Omar2000';
$dbName = 'b33_28842850_malinis';

$conn = mysqli_connect($serverName, $userName, $pwd, $dbName);


if (!$conn) {
    header('Location: pradmui.php?error=dbConErr&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
   exit();
}

