<?php
  include('before-title.php');
  echo '<title>:: Reset Password | Malinis ::</title>';
  include 'linksrspwui.php';
  include('after-links.php');
  include('header.php');
?>


<form action="resetPassHandler.php" method="POST">
    <h5>Enter the email address you have used to sign up to Malinis. We'll send you an email with a password reset link.</h5>
    
 <?php

if (isset($_GET['error'])) {
  if ($_GET['error'] == 'empty') {
    echo('<p class="error">Input field cannot be blank!</p>');
  }
  
  if ($_GET['error'] == 'invalidemail') {
    echo('<p class="error">Enter a valid email address!</p>');
  }
  
  if ($_GET['error'] == 'dbconnerr' || $_GET['error'] == 'stmtfailed') {
    echo('<p class="error">Connection error! Try again later.</p>');
  }
  
  if ($_GET['error'] == 'none') {
    echo('<p class="success">Success! Check your mail!</p>');
  }
  
  if ($_GET['error'] == 'notfound') {
    echo('<p class="error">There is no account signed up with this email address.</p>');
  }
  
  if ($_GET['error'] == 'link') {
      echo('<p class="error">Password reset link expired. Please try again.</p>');
  }
  
  if ($_GET['error'] == 'unmatchedtoken') {
    echo('<p class="error">We couldn\'t verify your request. </p>');
  }
  
}

?>
    
    
    <input type="text" name="resetEmail" placeholder="Enter email address...">
    <button type="submit" name="resetEmailSubmit">Get reset link via email</button>
    
    <h5>Back to <a href="login.php">log in</a></h5>
</form>

<?php
include('footer.php');
?>