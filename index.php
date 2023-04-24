<?php
session_start();

include('before-title.php');

echo '<title>:: Home | Malinis :: </title>';
include('linksindex.php');
include('after-links.php');
echo '<div class="grid">';
include ('header.php');

?>
<main>
    
<div class="search-box-div">
 <form action="index.php">
   <input type="text" placeholder="Search in malinis..." name="searched">
   <button type="submit" name="search-submit"><i class="fas fa-search"></i></button>
 </form>
</div>
    

    
<h2>Get your favourite products at best prices!</h2>
    
<?php

include('media-300to549.php');
include('media-550to899.php');
include('media-900to1200.php');

echo("</main>");

include('footer.php');

		
  
  
 ?>
