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
            <h2 class="entry-title"><a href="#">Penghapusan Data Fasum</a></h2><hr />
            <div class="entry-content">
<?php
	$id_fasum=$_GET['id_fasum'];
	$link=koneksi_db();
	$sql="delete from fasum where id_fasum='$id_fasum'";
	$res=mysql_query($sql); 
	if($res){
	?>
		<div class="info">Data fasilitas umum telah dihapus.</div>
		<?php
	}
	else {
	?>
		<div class="error">Data fasilitas umum tidak bisa dihapus karena digunakan oleh tabel lain</div>
	<?php
	}
?> 
<a href="fasum_lihat.php"><center>Kembali ke pengolahan data.</center></a>	
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