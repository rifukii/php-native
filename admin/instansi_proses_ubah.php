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
    <link rel="Icon" href="../images/icon.ico">
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
    <script src="js/modernizr-1.7.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script src="js/script.js"></script>
    
   
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
            <h2 class="entry-title"><a href="#">Proses Pengubahan Instansi</a></h2><hr /> 
            <div class="entry-content">
<?php
	$id_instansi=$_POST['id_instansi'];
	$nama_instansi=$_POST['nama_instansi'];
	$singkatan=$_POST['singkatan'];
	$link=koneksi_db();
	$sql="update instansi set id_instansi='$id_instansi', nama_instansi='$nama_instansi', singkatan='$singkatan' where id_instansi='$id_instansi'";
	$res=mysql_query($sql);
	if($res){
	?>
		<div class="info">Data instansi<?php echo $nama_instansi;?> telah diubah.</div>
		<?php
	}
	else {
	?>
		<div class="error">Data instansi<?php echo $nama_instansi;?> gagal diubah dengan pesan kesalahan <b>
		<?php echo mysql_error();?></b>.</div>
	<?php
	}
?> 
<a href="instansi_lihat.php"><center>Kembali ke pengolahan data.</center></a>	
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