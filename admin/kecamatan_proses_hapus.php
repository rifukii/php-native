<?php 
	session_start();
	if(isset($_SESSION['sudahlogin']))
	{
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php 
	include("lib_func.php");
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
    <header id="header" class="clearfix" role="banner">
         <hgroup>
            <h1 id="site-title"><a href="home.php">Bappeda Sumedang</a></h1>
            <h2 id="site-description">Website Pemetaan Fasilitas Umum</h2>
        </hgroup>
    </header>
<div id="main" class="clearfix">
    <nav id="menu" class="clearfix" role="navigation">
		<?php navigation();?>
    </nav>    
    <div id="content" role="main">
        <article class="post">
            <h2 class="entry-title"><a href="#">Penghapusan Data Kecamatan</a></h2><hr />
            <div class="entry-content">
<?php
	$id_kecamatan=$_GET['id_kecamatan'];
	$link=koneksi_db();
	$sql="delete from kecamatan where id_kecamatan='$id_kecamatan'";
	$res=mysql_query($sql); 
	if($res){
	?>
		<div class="info">Data kecamatan telah dihapus.</div>
		<?php
	}
	else {
	?>
		<div class="error">Data kecamatan tidak bisa dihapus karena digunakan oleh tabel lain</div>
	<?php
	}
?> 
<a href="kecamatan_lihat.php"><center>Kembali ke pengolahan data.</center></a>	
	</div>
        </article> 
    </div> 

</div> 
    <footer id="footer"a align="center">
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