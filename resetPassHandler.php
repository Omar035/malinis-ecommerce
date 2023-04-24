<?php

//This is password reset request creator code

if (!isset($_POST['resetEmailSubmit'])) {
header('Location: reset-password-ui.php');
 exit();
} else {
  
  $resetEmail = $_POST['resetEmail'];
  
 if (empty($resetEmail)) {
   header('Location: reset-password-ui.php?error=empty');
   exit();
} else {
  
if (!filter_var($resetEmail, FILTER_VALIDATE_EMAIL)) {
  header('Location: reset-password-ui.php?error=invalidemail');
  exit();
} else {
    
include('dbh-resetpw.php');

$sql = "select * from users where usersEmail =?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  header('Location: reset-password-ui.php?error=stmtfailed');
  exit();
  
} else {
  
mysqli_stmt_bind_param($stmt, "s", $resetEmail);
mysqli_stmt_execute($stmt);
 
$result = mysqli_stmt_get_result($stmt);

if (!mysqli_fetch_assoc($result)) {
   header('Location: reset-password-ui.php?error=notfound');
   exit();
} else {
 
 //Start making selector, token bla bla
 
$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$url= "malinis.totalh.net/create-new-password.php?selector=".$selector."&validator=". bin2hex($token);


//Link will expire after 10 minutes!

$expires = date("U") + 600;

require('dbh-resetpw.php');

$sql = "delete from pwdReset where pwdResetEmail=?";
;

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    
  header('Location: reset-password-ui.php?error=stmtfailed');
  exit();
  
} else {
    
  mysqli_stmt_bind_param($stmt, "s", $resetEmail);
  
  mysqli_stmt_execute($stmt);
}

$sql = "insert into pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) values (?, ?, ?, ?);";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    
  header('Location: reset-password-ui.php?error=stmtfailed');
  exit();
  
} else {
    
 $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    
  mysqli_stmt_bind_param($stmt, "ssss", $resetEmail, $selector, $hashedToken, $expires);
  
  mysqli_stmt_execute($stmt);
}

//ECHO PART: STARTS

echo '<html>';

echo '<head>
  <meta charset="UTF-8">
  <meta name="author" content="Omar Ibne Alam">
  <meta name="description" content="Welcome to the official website of Malinis. Get your favourite products at reasonable costs. Delivered with love.">
  <meta name="keywords" content="business, online business, accessories, fahmida hoque mahima, omar ibne alam, marina montaz, stuffs">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">	
		
  <title>:: Confirm Reset Password | Malinis ::</title>
  
  <link rel="shortcut icon" href="../site_images/favicon.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="login.css">
  
</head>';

echo '<body>';

echo '<form id="myForm" target="_self" onsubmit="return postToGoogle();" action="resetPassHandler.php" autocomplete="off">';
echo '<p class="success">Press OK to confirm and check your email inbox</p>';
    
echo '<input id="email" type="hidden" name="entry.584554397" value="'.$resetEmail.'">';
    
echo '<input id="link" type="hidden" name="entry.74824281" value="'.$url.'">';

echo '<button type="submit" name="submit">Press OK to Confirm</button>';

echo '</form>';


echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';

echo '<script>';



echo 'function postToGoogle() {
	 var field1 = $("#email").val();
  var field2 = $("#link").val();';
  
echo '$.ajax({
	 url: "https://docs.google.com/forms/d/e/1FAIpQLSc1PtYXI1NuGbE75i9EOmzh9M9TfcSA9J3P8fPCOKXOTg3Kog/formResponse?",';
	 
echo 'data: {"entry.584554397": field1, "entry.74824281": field2},
 type: "POST",
  dataType: "xml",
  success: function(d) {},
error: function(x, y, z)
{

}});';

echo '
window.location.redirect("http://malinis.byethost33.com/reset-password-ui.php?error=none");
return false;
};

</script>
</body>
</html>';
 

   
}
}
}
}
}



