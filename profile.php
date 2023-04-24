<?php
session_start();
include('profile-head.php');
include('header.php');

if (isset($_SESSION['Name']) && isset($_SESSION['id'])) {
?>
<div class="profile-main">

<section class="profile-details">
    
<div class="user-image" style="height: clamp(105px, 35vw, 420px);
 width: clamp(105px, 35vw, 420px);
 border-radius: 50%;
 background-image: url('<?php if (!isset($_SESSION["userImgLow"])) { echo "images/userAvatar.png";}
 else {
   echo $_SESSION["userImgLow"];
 }
 ?>');
 background-size: cover;
"> <!--<img src="" alt=""> -->
</div>

<h1><?php  echo $_SESSION['Name']; ?></h1>
<?php

if (isset($_GET['error'])) {
  if ($_GET['error'] == 'invalidfiletype') {
   echo('<p class="error">You are not allowed to upload files of this type!</p>');
  }
  
  if ($_GET['error'] == 'error' || $_GET['error'] == 'notsaved') {
   echo('<p class="error">There was an error while uploading your image!</p>');
  }
  
  if ($_GET['error'] == 'largefile') {
   echo('<p class="error">Image size cannot exceed 5MB!</p>');
  }
  
  if ($_GET['error'] == 'none') {
   echo('<p class="success">Image successfully uploaded! Please logout & login back to see changes.</p>');
  }
  
    if ($_GET['error'] == 'dbconnerr' || $_GET['error'] == 'queryerror' || $_GET['error'] == 'unsavedtodb') {
   echo('<p class="error">Connection error! Try again later.</p>');
  }
}

if (!isset($_SESSION['userImgLow'])) {
  echo '<form id="uploadDP" action="includes/uploadDP.php" method="POST" enctype="multipart/form-data">
<label ="custom-file-input-label">
 <input class="custom-file-input" type="file" name="user-image">
 </label>
 <button type="submit" name="dp-submit">Upload image</button>
</form>';
}



?>
<h4>Address: <?php echo $_SESSION['Address']; ?></h4>

<h4>email: <?php echo $_SESSION['Email']; ?></h4>

<h4>Phone: <?php echo '0'.$_SESSION['Number']; ?></h4>

<h4 id="last-h4">Total no. of orders:<?php 
if ($_SESSION['TotalOrders'] == 0) {
   echo ' '.'0';
} else {
    echo $_SESSION['TotalOrders'];
}
?></h4>

    
  
<form id="logout" action="includes/logout.php" method="POST">
    <button type="submit" name="logout-submit">Log out</button>
</form>  
</section>

<section class="wishlist">
  Wishlist.
</section>

</div>
<?php
}
else {
  header('Location: login.php');
  exit();
}

include('footer.php');
?>
