<?php

//This is the new password creator code 


if (!isset($_POST['newPassSubmit'])) {
  
 header('Location: reset-password-ui.php');
 exit();
} else {

$selector = $_POST['selector'];
$validator = $_POST['validator'];
$newPwd = $_POST['newPwd'];
$repeat = $_POST['rstNewPwd'];

if (empty($newPwd) || empty($repeat)) {
    
 header('Location: create-new-password.php?selector='.$selector.'&validator='.$validator.'&error=blank');
 exit();
  
} else {
  
$uppercase = preg_match('@[A-Z]@', $_POST['newPwd']);
$lowercase = preg_match('@[a-z]@', $_POST['newPwd']);
$num = preg_match('@[0-9]@', $_POST['newPwd']);


if(!$uppercase || !$lowercase || !$num || strlen($_POST['newPwd']) < 6) {
   
header('Location: create-new-password.php?selector='.$selector.'& validator='.$validator.'&error=weakpwd');
exit();
} else {
if ($newPwd !== $repeat) {
  
  header('Location: create-new-password.php?selector='.$selector.'&validator='.$validator.'&error=dontmatch');
  exit();
  
} else {
  
$currentTime = date("U");

include('dbh-createnpw.php');

$sqlStmt = "SELECT * FROM pwdReset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sqlStmt)) {
 
 header('Location: create-new-password.php?selector='.$selector.'&validator='.$validator.'&error=stmtfailed');
 exit();
  
} else {
 
 mysqli_stmt_bind_param($stmt, "si", $_POST['selector'], date("U"));
 mysqli_stmt_execute($stmt);
 
$result = mysqli_stmt_get_result($stmt);

if (!$rows = mysqli_fetch_assoc($result)) {
  header('Location: reset-password-ui.php?error=link');
  exit();
} else {
    
$tokenBin = hex2bin($validator);

$tokenCheck = password_verify($tokenBin, $rows['pwdResetToken']);
    
    
if ($tokenCheck == false) {
  
 header('Location: reset-password-ui.php?error=unmatchedtoken');
 exit();  
 
} else if ($tokenCheck == true) {
  
 $tokenEmail = $rows['pwdResetEmail'];
 
 $sql = "SELECT * FROM users WHERE usersEmail = ?;";
 $stmt = mysqli_stmt_init($conn);
 
 if (!mysqli_stmt_prepare($stmt, $sql)) {
 
 header('Location: create-new-password.php?selector='.$selector.'&validator='.$validator.'&error=stmtfailed');
 exit();
} else {
 
mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

if (!mysqli_fetch_assoc($result)) {
  header('Location: reset-password-ui.php?error=notfound');
  exit();
} else {

$sql = "UPDATE users SET usersPwd = ? WHERE usersEmail = ?;";
$stmt = mysqli_stmt_init($conn);
 
 if (!mysqli_stmt_prepare($stmt, $sql)) {
 
 header('Location: create-new-password.php?selector='.$selector.'&validator='.$validator.'&error=stmtfailed');
 exit();
} else {
    
$newPwdHash = password_hash($newPwd, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
mysqli_stmt_execute($stmt);

  header('Location: login.php?error=resetsuccess');
  exit();
  


}
}
}
}else {
    
  header('Location: reset-password-ui.php?error=unmatchedtoken');
 exit();  
  
}
}
}
}
}
}
}
