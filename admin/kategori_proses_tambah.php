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
            <h2 class="entry-title"><a href="#">Penambahan Data Kategori</a></h2><hr /> 
            <div class="entry-content">
    <?php
	$nama_kategori=$_POST['nama_kategori'];
	$link=koneksi_db();
	$sql="insert into kategori_fasum values(null,trim('$nama_kategori'))"; // susun SQL
	$res=mysql_query($sql,$link); // Eksekusi SQL
	if($res){
		//Jika berhasil 
	?> 
		<div class="info">Data kategori <b><?php echo $nama_kategori;?></b> telah disimpan</b></div> 
	<?php
	} 
	else{
		//Jika gagal
	?> 
		<div class="error">Terjadi kesalahan dalam penyimpanan data kategori baru dengan kesalahan <?php echo mysql_error();?>. Silahkan diulang lagi.<br></div>
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