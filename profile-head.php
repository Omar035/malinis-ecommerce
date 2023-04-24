<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Omar Ibne Alam">
  <meta name="description" content="Welcome to the official website of Malinis. Get your favourite products at reasonable costs. Delivered with love.">
  <meta name="keywords" content="business, online business, accessories, fahmida hoque mahima, omar ibne alam, marina montaz, stuffs">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">	
		
  <title>:: <?php echo($_SESSION['Name']);?> | Malinis ::</title>
  
  <link rel="shortcut icon" href="site_images/favicon.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link rel="stylesheet" href="includes/index300to650.css" type="text/css"/>
  <link rel="stylesheet" href="includes/index651to1200.css" type="text/css"/>
  <link rel="stylesheet" href="includes/profile.css" type="text/css">
 
  
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