<?php

if (!isset($_POST['adminSubmit'])) {
   header('Location: verifyadmin.php');
   exit();
} else {
    
    $AdminUname = $_POST['adminUsername'];
    $AdminPass = $_POST['adminPass'];
    
   if ($AdminUname == "M1A2L3I4N5I6S7" && $AdminPass == "<||Malinis@Is@Great||>") {
      session_start();
      $_SESSION['Admin'] = "AdminReady";
      header('Location: pradmui.php');
      exit();
   } else {
    header('Location: verifyadmin.php?not=match');
    exit();
    
    
   }
}
