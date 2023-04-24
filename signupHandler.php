<?php 

if (!isset($_POST['signup-submit'])) {
    
    header('Location: signup.php');
    exit();
    
} else {
    
 $name = $_POST['name'];
 $email = $_POST['email'];
 $number = $_POST['number'];
 $address = $_POST['address'];
 $username = $_POST['username'];
 $pwd = $_POST['password'];
 $pwdrepeat = $_POST['pwdrepeat'];
    
 include('includes/dbh-signup.php');
 
 if (empty($name) || empty($email) || empty($number) || empty($address) || empty($username)) {
     
 header('Location: signup.php?error=empty&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
 
 exit();
     
 } else {
     
  if (!preg_match("/^[ a-zA-Z]*$/", $name)) {
   header('Location: signup.php?error=invalidnamechars&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
   exit();
     
} else {
    
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   header('Location: signup.php?error=invalidemail&name='.$name.'&number='.$number.'&address='.$address.'&username='.$username);
   exit();
  } else {
      
  if (strlen($number)!== 11) {
   header('Location: signup.php?error=invalidnum&name='.$name.'&email='.$email.'&address='.$address.'&username='.$username);
   exit();
} else {
  
  if (strlen($username) > 20) {
     header('Location: signup.php?error=longuname&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address);
     exit();
} else {
    
  if (!preg_match("/^[_a-zA-Z0-9]*$/", $username)) {
   header('Location: signup.php?error=invaliduname&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address);
   exit();
} else {

$uppercase = preg_match('@[A-Z]@', $_POST['password']);
$lowercase = preg_match('@[a-z]@', $_POST['password']);
$num = preg_match('@[0-9]@', $_POST['password']);


if(!$uppercase || !$lowercase || !$num || strlen($_POST['password']) < 6) {
   
   header('Location: signup.php?error=pwdweak&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
   exit();
   
} else {
    
 if ($_POST['password'] !== $_POST['pwdrepeat']) {
   header('Location: signup.php?error=unmatchedpwd&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
   exit();
} else {
    
  $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    
$stmt = mysqli_stmt_init($conn);
    
 if (!mysqli_stmt_prepare($stmt, $sql)) {
   header('Location: signup.php?error=stmtfailed&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
   exit();
}
   
   mysqli_stmt_bind_param($stmt, "s", $email);
   mysqli_stmt_execute($stmt);
   
$resultData = mysqli_stmt_get_result($stmt);

if (mysqli_fetch_assoc($resultData)) {
    header('Location: signup.php?error=emailtaken&name='.$name.'&number='.$number.'&address='.$address.'&username='.$username);
    exit();
} else {
    
  $sql = "SELECT * FROM users WHERE usersUsername = ?;";
    
$stmt = mysqli_stmt_init($conn);
    
 if (!mysqli_stmt_prepare($stmt, $sql)) {
   header('Location: signup.php?error=stmtfailed&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
   exit();
}
   
   mysqli_stmt_bind_param($stmt, "s", $username);
   mysqli_stmt_execute($stmt);
   
$resultData = mysqli_stmt_get_result($stmt);

if (mysqli_fetch_assoc($resultData)) {
    header('Location: signup.php?error=unametaken&name='.$name.'&number='.$number.'&address='.$address.'&email='.$email);
} else {
    
  $sql = "INSERT INTO users (usersName, usersEmail, usersNumber, usersAddr, usersUsername, usersPwd) VALUES (?, ?, ?, ?, ?, ?);";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
   header('Location: signup.php?error=stmtfailed&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
   exit();
}

$hashedPwd = password_hash($_POST['password'], PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt, "ssisss", $name, $email, $number, $address, $username, $hashedPwd);


if (!mysqli_stmt_execute($stmt)) {
    
    header('Location: signup.php?error=insertionfailed&name='.$name.'&email='.$email.'&number='.$number.'&address='.$address.'&username='.$username);
    exit();
    
} else {
    
  header('Location: login.php?msg=signupsuccess');
    
}}}}}}}}}}}}

