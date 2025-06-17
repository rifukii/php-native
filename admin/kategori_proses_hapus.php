<?php 
	session_start();
	if(isset($_SESSION['sudahlogin']))
	{
?>
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
    <link rel="Icon" href="../images/icon.ico">   
</head>
<body>
<div id="wrapper">
    <header id="header" class="clearfix" role="banner">
		<?php head();?>
    </header>
<div id="main" class="clearfix">
    <nav id="menu" class="clearfix" role="navigation">
		<?php navigation();?>
    </nav>    
    <div id="content" role="main">
        <article class="post">
            <h2 class="entry-title"><a href="#">Pengubahan Data Kategori</a></h2><hr />
            <div class="entry-content">
<?php
	$id_kategori=$_GET['id_kategori'];
	$link=koneksi_db();
	$sql="delete from kategori_fasum where id_kategori='$id_kategori'";
	$res=mysql_query($sql); 
	if($res){
	?>
		<div class="info">Data kategori telah dihapus.</div>
		<?php
	}
	else {
	?>
		<div class="error">Data kategori tidak bisa dihapus karena digunakan oleh tabel lain</div>
	<?php
	}
?> 
<a href="kategori_lihat.php"><center>Kembali ke pengolahan data.</center></a>	
	</div>
        </article> 
         
    </div> 
</div> 
    <footer id="footer" align="center">
		<?php footer();?>
    </footer> 
    <div class="clear"></div>
</div> 
</body>
</html>
<?php
	}
	else
		header("Location: haruslogin.php");
?>