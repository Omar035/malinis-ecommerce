 <?php

function items($no, $price) {
    
  echo '<a href="index.php"><div class="item'.$no.'">
  <div class="pr-img"></div>
  <h4>Product '.$no.'</h4>
  <h3>৳'.$price.'</h3>
    <h6>
      <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
  </h6>
  </div></a>';
    
}
 
 
 ?>
 
  <div class="media-300to549">
  <div class="row1">
<?php
items(1, 150);
items(2, 130);

?>

</div>

  <div class="row2">
<?php
items(3, 230);
items(4, 200);

?>

  </div>

 
  <div class="row3">
<?php
items(5, 150);
items(6, 190);

?>

</div>
  
  <div class="row4">
<?php
items(7, 310);
items(8, 99);

?>

  </div>
  
  <div class="row5">
<?php
items(9, 110);
items(10, 270);

?>

</div>


  <div class="row6">
  	<?php
items(11, 240);
items(12, 160);

?>


  </div>
</div>	 
  			