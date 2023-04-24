<?php 
include 'before-title.php';
?>
<title>:: Admin | Malinis ::</title>
<link rel="shortcut icon" href="site_images/favicon.png" type="image/x-icon" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login.css">

<style>
body {
    display: flex;
    justify-content: center;
}

/*form {
    height: 200px;
    width: 300px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    
}*/
form {
    font-family: 'Lato', sans-serif;
}


</style>
</head>
<body>
    
<form action="vrfAdmHandler.php" method="POST">
<?php
if (isset($_GET['not'])) {
   if ($_GET['not'] == 'match') {
      echo '<p class="error">Username or password incorrect!</p>';
   }
}

?>
   
    <input type="text" placeholder="Username" name="adminUsername">
    <input type="password" placeholder="password" name="adminPass">
    <button type="submit" name="adminSubmit">Log in</button>
</form>
</body>
</html>