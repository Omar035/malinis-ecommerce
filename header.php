   <header>
  	 <div class="title-logo">Malinis</div>
  	 
<div class="cart-and-number"><i class="fas fa-shopping-cart"></i>
  <span>0</span></div>
 	<div class="hamburger">
<div class="bar bar1"></div>
  <div class="bar bar2"></div>
  <div class="bar bar3"></div>
  	</div>
  				
  	<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="#">All Products</a></li>
  <li><a href="#">Customized Gift Box</a></li>
  <li><a href="#">About</a></li>
  	<li>
<?php

if (isset($_SESSION['Name'])) {
   
  echo('<a href="profile.php">Profile</a>');
   
} else {
    echo '<a href="login.php">Log in</a>';
}

  	    
  	    
?>
  	</li>
  				</ul>
  				
  </header>
 