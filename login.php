<?php
  include('before-title.php');
  echo('<title>:: Login | Malinis ::</title>');
  include('linkslogin.php');
  include('after-links.php');
  include('header.php');
?>


<form action="includes/loginHandler.php" method="POST">
    <h2>Malinis</h2>

<?php
           
 if (isset($_GET['msg'])) {
    
   if ($_GET['msg'] == 'signupsuccess') {
      echo('<p class="success">You have successfully signed up. Login now to enter your account.</p>');
   }};
   

   
   
 if (isset($_GET['error'])) {
     
  if ($_GET['error'] == 'empty') {
    
   echo('<p class="error">You didn\'t fill all fields</p>');
  }
  
  if ($_GET['error'] == 'stmtfailed' || $_GET['error'] == 'something') {
    
   echo('<p class="error">Something went wrong. Please try again.</p>');
  }
  
  if ($_GET['error'] == 'pwdwrong') {
    
   echo('<p class="error">Incorrect password!</p>');
    
  }
  
  if ($_GET['error'] == 'notfound') {
    
   echo('<p class="error">The username or email you provided wasn\'t found!</p>');
    
  }
  
  if ($_GET['error'] == 'resetsuccess') {
   echo '<p class="success">Password has successfully been reset! Try logging in now!</p>';
  }
  
 };
 
 
 if (isset($_GET['username'])) {
  $unm = $_GET['username'];
   
  echo('<input type="text" name="uname" placeholder="Username/Email..." value="'.$unm.'">');
  
 } else {
  
  echo('<input type="text" name="uname" placeholder="Username/Email...">');
 }
?> 
            
            
 
  <input type="password" placeholder="Password..." name="psd">
  <button type="submit" name="login-submit">Log in</button>
    <h5>Don't have an account? <a href="signup.php">Sign up</a></h5>
    <h5><a href="reset-password-ui.php">Forgot your password?</a></h5>

</form>



<?php
include('footer.php');
?>