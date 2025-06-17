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
            <h2 class="entry-title"><a href="#">Penambahan Data Fasilitas Umum</a></h2><hr />
            <div class="entry-content">
            
    <?php
    $link=koneksi_db();
    $nama_fasum=$_POST['nama_fasum'];
	$id_fasum=$_POST['id_fasum'];
	$kondisi=$_POST['kondisi'];
	$alamat=$_POST['alamat'];
	$id_kecamatan=$_POST['id_kecamatan'];
	$id_instansi=$_POST['id_instansi'];
	$username=$_POST['username'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	
	$sql="insert into fasum values(null,trim('$nama_fasum'),trim('$id_fasum'),trim('$kondisi'),trim('$alamat'),trim('$id_kecamatan'),trim('$id_instansi'),trim('$username'),trim('$lat'),trim('$lng'))"; // susun SQL
	$res=mysql_query($sql,$link); // Eksekusi SQL
	if($res){
		//Jika berhasil 
	?> 
		<div class="info">Data fasilitas umum <b><?php echo $nama_fasum;?></b> telah disimpan</b></div> 
	<?php
	} 
	else{
		//Jika gagal
	?> 
		<div class="error">Terjadi kesalahan dalam penyimpanan data baru dengan kesalahan <?php echo mysql_error();?>. Silahkan diulang lagi.<br></div>
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