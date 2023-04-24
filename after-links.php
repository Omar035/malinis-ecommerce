</head>
<body>
  
  
  <div class="preloader-page">
    <h1>MALINIS</h1>
    <div class="dots-container">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div>      
  <div class="hidden">
  				<ul>
  								<li><a href="index.php">Home</a></li>
  								<li><a href="#">All Products</a></li>
  								<li><a href="#">Customized Gift Box</a></li>
  								<li><a href="#">About Us</a></li>
  								<li><?php

if (isset($_SESSION['Name'])) {
   
  echo('<a href="profile.php">Profile</a>');
   
} else {
    echo '<a href="login.php">Log in</a>';
}

  	    
  	    
?></li>
  				</ul>
  		
  </div>

