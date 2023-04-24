<?php

if (!isset($_POST['ProductSubmit'])) {
  header('Location: pradmui.php');
  exit();
} else {
 $Name = $_POST['name'];
 $Price = $_POST['price'];
 $Description = $_POST['desc'];
 $Colors = $_POST['color'];
 $Sizes = $_POST['size'];
 $Materials = $_POST['material'];
 $Transparency = $_POST['transparency'];
 $Capacities = $_POST['capacity'];
 $Straw = $_POST['straw'];
 $Stock = $_POST['stock'];
 
 if (!empty($_FILES['img1'])) {
   $img1name = $_FILES['img1']['name'];
   $img1tmp = $_FILES['img1']['tmp_name'];
   $img1size = $_FILES['img1']['size'];
   $img1error = $_FILES['img1']['error'];
   $img1type = $_FILES['img1']['type'];
 }
 
 if (!empty($_FILES['img2'])) {
   $img2name = $_FILES['img2']['name'];
   $img2tmp = $_FILES['img2']['tmp_name'];
   $img2size = $_FILES['img2']['size'];
   $img2error = $_FILES['img2']['error'];
   $img2type = $_FILES['img2']['type'];
 }
 
 if (!empty($_FILES['img3'])) {
   $img3name = $_FILES['img3']['name'];
   $img3tmp = $_FILES['img3']['tmp_name'];
   $img3size = $_FILES['img3']['size'];
   $img3error = $_FILES['img3']['error'];
   $img3type = $_FILES['img3']['type'];
 }
 
 if (!empty($_FILES['img4'])) {
   $img4name = $_FILES['img4']['name'];
   $img4tmp = $_FILES['img4']['tmp_name'];
   $img4size = $_FILES['img4']['size'];
   $img4error = $_FILES['img4']['error'];
   $img4type = $_FILES['img4']['type'];
 }
 
 if (!empty($_FILES['img5'])) {
   $img5name = $_FILES['img5']['name'];
   $img5tmp = $_FILES['img5']['tmp_name'];
   $img5size = $_FILES['img5']['size'];
   $img5error = $_FILES['img5']['error'];
   $img5type = $_FILES['img5']['type'];
 }
 
 
 
if (empty($Name) || empty($Price)) {
   header('Location: pradmui.php?error=empty&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
   exit();
} else {

// Validate COLOR, SIZE, MATERIAL, CAPACITY inputs.
//Only a-z, A-Z, 0-9, Comma and Spaces

//Color
if (!preg_match("/^[ ,a-zA-Z0-9]*$/", $Colors)) {
   header('Location: pradmui.php?error=invColChar&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
   exit();
} 
//Size
elseif (!preg_match("/^[ ,a-zA-Z0-9]*$/", $Sizes)) {
   header('Location: pradmui.php?error=invSizeChar&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
   exit();
} 
//Material
elseif (!preg_match("/^[ ,a-zA-Z0-9]*$/", $Materials)) {
   header('Location: pradmui.php?error=invMatChar&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
   exit();
}
//Capacity
elseif (!preg_match("/^[ ,a-zA-Z0-9]*$/", $Capacities)) {
   header('Location: pradmui.php?error=invCapChar&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
   exit();
} else {
    
$fileExt1 = explode('.', $img1name);
$fileExt2 = explode('.', $img2name);
$fileExt3 = explode('.', $img3name);
$fileExt4 = explode('.', $img4name);
$fileExt5 = explode('.', $img5name);
  
$fileActualExt1 = strtolower(end($fileExt1));
$fileActualExt2 = strtolower(end($fileExt2));
$fileActualExt3 = strtolower(end($fileExt3));
$fileActualExt4 = strtolower(end($fileExt4));
$fileActualExt5 = strtolower(end($fileExt5));

$allowed = array ('jpg', 'jpeg', 'png', 'webp');

if (!empty($fileActualExt1) && !in_array($fileActualExt1, $allowed)) {
    header('Location: pradmui.php?error=invImg1&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
    exit();
} elseif (!empty($fileActualExt2) && !in_array($fileActualExt2, $allowed)) {
    header('Location: pradmui.php?error=invImg2&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
    exit();
} elseif (!empty($fileActualExt3) && !in_array($fileActualExt3, $allowed)) {
    header('Location: pradmui.php?error=invImg3&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
    exit();
} elseif (!empty($fileActualExt4) && !in_array($fileActualExt4, $allowed)) {
    header('Location: pradmui.php?error=invImg4&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
    exit();
} elseif (!empty($fileActualExt5) && !in_array($fileActualExt5, $allowed)) {
    header('Location: pradmui.php?error=invImg5&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
    exit();
} else {
  
if (($img1error == 0) && ($img2error == 0) && ($img3error == 0) && ($img4error == 0) && ($img5error == 0)) {
    header('Location: pradmui.php?error=errImg&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
  exit();
} else {
  
$fileNmNew1 = uniqid('', true) . '.' . bin2hex(random_bytes(8)) . '.' . date("U") . '.' . $fileActualExt1;
$fileNmNew2 = uniqid('', true) . '.' . bin2hex(random_bytes(8)) . '.' . date("U") . '.' . $fileActualExt2;
$fileNmNew3 = uniqid('', true) . '.' . bin2hex(random_bytes(8)) . '.' . date("U") . '.' . $fileActualExt3;
$fileNmNew4 = uniqid('', true) . '.' . bin2hex(random_bytes(8)) . '.' . date("U") . '.' . $fileActualExt4;
$fileNmNew5 = uniqid('', true) . '.' . bin2hex(random_bytes(8)) . '.' . date("U") . '.' . $fileActualExt5;

if (!empty($img1name)) {
  $fileD1 = 'product_images/' . $fileNmNew1;
} else {
  $fileD1 = "";
}

if (!empty($img2name)) {
  $fileD2 = 'product_images/' . $fileNmNew2;
} else {
  $fileD2 = "";
}

if (!empty($img3name)) {
  $fileD3 = 'product_images/' . $fileNmNew3;
} else {
  $fileD3 = "";
}

if (!empty($img4name)) {
  $fileD4 = 'product_images/' . $fileNmNew4;
} else {
  $fileD4 = "";
}

if (!empty($img5name)) {
  $fileD5 = 'product_images/' . $fileNmNew5;
} else {
  $fileD5 = "";
}


require 'dbh-prUpload.php';


$sql = 'INSERT INTO products (pr_name, pr_price, pr_desc, pr_color, pr_size, pr_material, pr_capacity, pr_transparency, pr_straw, pr_stock, pr_img1, pr_img2, pr_img3, pr_img4, pr_img5) VALUES ("'.$Name.'", "'.$Price.'", "'.$Description.'", "'.$Colors.'", "'.$Sizes.'", "'.$Materials.'", "'.$Capacities.'", "'.$Transparency.'", "'.$Straw.'", "'.$Stock.'", "'.$fileD1.'", "'.$fileD2.'", "'.$fileD3.'", "'.$fileD4.'", "'.$fileD5.'")';

if (!mysqli_query($conn, $sql)) {
  
  header('Location: pradmui.php?error=queErr&desc='.$Description.'&color='.$Colors.'&size='.$Sizes.'&material='.$Materials.'&transparency='.$Transparency.'&capacity='.$Capacities.'&straw='.$Straw.'&stock='.$Stock.'&name='.$Name.'&price='.$Price);
  exit();
  
} else {
    
if (!empty($img1name)) {
  move_uploaded_file($img1tmp, $fileD1);
}

if (!empty($img2name)) {
  move_uploaded_file($img2tmp, $fileD2);
}

if (!empty($img3name)) {
  move_uploaded_file($img3tmp, $fileD3);
}

if (!empty($img4name)) {
  move_uploaded_file($img4tmp, $fileD4);
}

if (!empty($img5name)) {
  move_uploaded_file($img5tmp, $fileD5);
}

header('Location: pradmui.php?error=none');
exit();

}
}
}
}
}
}