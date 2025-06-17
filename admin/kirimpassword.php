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
<form class="box login" method="post" action="kirimpassword.php">
    <?php
	$link=koneksi_db();
$username = $_POST['username'];

function randomPassword()
{

$digit = 6;
$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";

srand((double)microtime()*1000000);
$i = 0;
$pass = "";
while ($i <= $digit-1)
{
$num = rand() % 32;
$tmp = substr($karakter,$num,1);
$pass = $pass.$tmp;
$i++;
}
return $pass;
}

$newPassword = randomPassword();

$pengacak  = "NDJS3289JSKS190JISJI";
	
$newPasswordEnkrip = md5($newPassword);

$query = "SELECT * FROM admin WHERE username = '$username'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$alamatEmail = $data['email'];

$title  = "Password Baru";

$pesan  = "Username Anda : ".$username.". \nPassword Anda yang baru adalah ".$newPassword;

$header = "From: admin@fasumsumedang.net";

$kirimEmail = mail($alamatEmail, $title, $pesan, $header);

if ($kirimEmail) {

    $query = "UPDATE admin SET password = '$newPasswordEnkrip' WHERE username = '$username'";
    $hasil = mysql_query($query);
	
    if ($hasil) echo "<h2>Password baru telah direset dan sudah dikirim ke email Anda</h2>";
    }
else echo "<h2>Pengiriman password baru ke email gagal</h2>";

?>
	<div class="buttons" align="center"><a href="index.php"><button type="submit" class="positive" value="Login" tabindex="2"><img src="../images/back.png">Kembali</button></a>
         </div>
         
         </form> 
</body>
</html>