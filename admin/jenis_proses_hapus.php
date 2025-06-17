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
            <h2 class="entry-title"><a href="#">Penghapusan Jenis Fasilitas Umum</a></h2><hr />
            <div class="entry-content">
<?php
	$id_jenis=$_GET['id_jenis'];
	$link=koneksi_db();
	$sql="delete from jenis_fasum where id_jenis='$id_jenis'";
	$res=mysql_query($sql); 
	if($res){
	?>
		<div class="info">Jenis fasilitas umum telah dihapus.</div>
		<?php
	}
	else {
	?>
		<div class="error">Data jenis tidak bisa dihapus karena digunakan oleh tabel lain</div>
	<?php
	}
?> 	
<a href="jenis_lihat.php"><center>Kembali ke pengolahan data.</center></a>
	</div>
        </article> 
    </div> 
</div> 
    <footer id="footer" align="center">
		<?php footer();?>
    </footer> 
</div> 
</body>
</html>
<?php
	}
	else
		header("Location: haruslogin.php");
?>