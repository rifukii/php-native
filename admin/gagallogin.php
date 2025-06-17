<!doctype html>
<html lang="id">
<head>
	<?php 
	include("lib_func.php");
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pemetaan Fasilitas Umum Kabupaten Sumedang</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="ICON" href="../images/icon.ico">    
</head>
<body>
<form class="box login" method=post action="login.php">
	<h2 class="error">LOGIN GAGAL!</h2>
    <p>Periksa kembali username dan password anda.</p>
      <label>Username</label>
	  <input type="text" tabindex="1" name="username" placeholder="Username" required>
	  <label>Password</label>
	  <input type="password" name="password" placeholder="Password" tabindex="2" required>
	<div class="buttons" align="center"><button type="submit" class="positive" value="Login" tabindex="3">
        <img src="../images/key.png">Login
         </button>
         </div>
         <div align="center"><br><a href="lupapassword.php">Lupa password?</a></div>
</form>
</body>
</html>
