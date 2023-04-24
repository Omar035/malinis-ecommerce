<?php
  include('before-title.php');
  echo '<title>:: Signup | Malinis ::</title>';
  include('linkssignup.php');
  include 'after-links.php';
  include('header.php');
?>




<form action="signupHandler.php" method="POST">
            <h2>Malinis</h2>


<?php
    
if (isset($_GET['error'])) {
    
   if ($_GET['error'] == 'dbconnerr') {
      echo('<p class="error">Connection error! Please try again later.</p>');
   }
        
   if ($_GET['error'] == 'empty') {
      echo('<p class="error">You did not fill all fields!</p>');
   }
   
   if ($_GET['error'] == 'invalidnamechars') {
      echo('<p class="error">You may have misspelled your name!</p>');
   }
   
      if ($_GET['error'] == 'invalidemail') {
      echo('<p class="error">Enter a valid email address!</p>');
   }
   
      if ($_GET['error'] == 'invalidnum') {
      echo('<p class="error">Your phone number must contain 11 digits!</p>');
   }
   
      if ($_GET['error'] == 'longuname') {
      echo('<p class="error">Username too long!</p>');
   }
   
      if ($_GET['error'] == 'invaliduname') {
      echo('<p class="error">Username can only contain letters, numbers and underscores( _ )!</p>');
   }
   
   
      if ($_GET['error'] == 'pwdweak') {
      echo('<p class="error">Password should be at least 6 characters in length and include at least one upper case letter and one digit.</p>');
   }
   
      if ($_GET['error'] == 'unmatchedpwd') {
      echo("<p class='error'>Passwords didn't match!</p>");
   }
   
      if ($_GET['error'] == 'stmtfailed' || $_GET['error'] == 'insertionfailed') {
      echo('<p class="error">Something went wrong. Please try again.</p>');
   }
   
      if ($_GET['error'] == 'emailtaken') {
      echo('<p class="error">The email is already signed up!</p>');
   }
   
      if ($_GET['error'] == 'unametaken') {
      echo('<p class="error">The username is taken!</p>');
   }
        
}
    
?>


<?php

if (isset($_GET['name'])) {
    
   $name = $_GET['name'];
   
   echo('<input type="text" name="name" placeholder="Full name..." value="'.$name.'">');
   
} else {
    echo('<input type="text" name="name" placeholder="Full name...">');
}


if (isset($_GET['email'])) {
    
   $email = $_GET['email'];
   
   echo(' <input type="text" name="email" placeholder="Email..." value="'.$email.'">');
   
} else {
    echo('<input type="text" name="email" placeholder="Email...">');
}


if (isset($_GET['number'])) {
    
   $number = $_GET['number'];
   
   echo('<input type="number" name="number" placeholder="Phone no...." value="'.$number.'">');
   
} else {
    echo('<input type="number" name="number" placeholder="Phone no....">');
}

if (isset($_GET['address'])) {
    
   $address = $_GET['address'];
   
   echo('<textarea name="address" cols="30" rows="10" placeholder="Full address..." >'.$address.'</textarea>');
   
} else {
    echo('<textarea name="address" cols="30" rows="10" placeholder="Full address..."></textarea>');
}

if (isset($_GET['username'])) {
    
   $username = $_GET['username'];
   
   echo('<input type="text" name="username" placeholder="Username..." value="'.$username.'">');
   
} else {
    echo('<input type="text" name="username" placeholder="Username...">');
}


?>

    <input type="password" name="password" placeholder="Password...">
   
    <input type="password" name="pwdrepeat" placeholder="Re-type password...">
    <button type="submit" name="signup-submit">Sign up</button>
    <h5>Already have an account? <a href="login.php">Log in</a></h5>

</form>


<?php
include('footer.php');
?>