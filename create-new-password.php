<?php
  include('before-title.php');
  echo '<title>:: Reset Password | Malinis ::</title>';
  include 'linksrspwui.php';
  include('after-links.php');
  include('header.php');

$selector = $_GET['selector'];
$validator = $_GET['validator'];

if (empty($selector) || empty($validator)) {
    
  echo('<p class="error">Sorry, could not validate your request!</p>');
  exit();
  
} else {
    
  if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
?>
 
 
<form action="createNewPassHandler.php" method="POST">
    <h5>Reset your password below. Please make sure that your password has atleast 6 characters and contains atleast an uppercase letter, a lowercase letter and a digit.</h5>
    
<?php

if (isset($_GET['error'])) {
  if ($_GET['error'] == 'blank') {
    echo '<p class="error">Fill in all fields!</p>';
    }
  
  if ($_GET['error'] == 'weakpwd') {
      echo('<p class="error">Password should be at least 6 characters in length and include at least one upper case letter and one digit.</p>');
   }
   
  if ($_GET['error'] == 'dontmatch') {
      echo('<p class="error">Passwords didn\'t match!</p>');
   }
   
  if ($_GET['error'] == 'dbconnerr' || $_GET['error'] == 'stmtfailed') {
      echo('<p class="error">Connection error! Please try again later.</p>');
   }
}

?>
    

<input type="hidden" name="selector" value="<?php  echo $selector; ?>">

<input type="hidden" name="validator" value="<?php  echo $validator; ?>">

<input type="password" name="newPwd" placeholder="New password...">

<input type="password" name="rstNewPwd" placeholder="Confirm new password...">
    
<button type="submit" name="newPassSubmit">Submit</button>
    
</form>

<?php

} else {
  echo '<p class="error">Sorry, could not validate your request. Please try again.</p>';

}
}

include('footer.php');
?>