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
            <h2 class="entry-title"><a href="#">Penghapusan Peraturan</a></h2><hr /> 
            <div class="entry-content">
<?php
	$id_aturan_jarak=$_GET['id_aturan_jarak'];
	$link=koneksi_db();
	$sql="delete from aturan_jarak where id_aturan_jarak='$id_aturan_jarak'";
	$res=mysql_query($sql);
	if($res){
	?>
		<div class="info">Data peraturan telah dihapus.</div>
		<?php
	}
	else {
	?>
		<div class="error">Data peraturan gagal dihapus dengan pesan kesalahan <b><?php echo mysql_error();?></b>.</div>
	<?php
	}
?> 	
<a href="aturanjrk_lihat.php"><center>Kembali ke pengolahan data.</center></a>
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