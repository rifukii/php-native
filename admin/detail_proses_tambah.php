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
            <h2 class="entry-title"><a href="#">Penambahan Data Detail Titik</a></h2><hr /> 
            <div class="entry-content">
    <?php
	if($_FILES['gambar']['error']==0){
	$link=koneksi_db();
	$id_detail=$_POST['id_detail'];
	$id_fasum=$_POST['id_fasum'];
	$gambar=$_FILES['gambar']['name'];
	$namagambar="../images/".$gambar;
	$deskripsi=$_POST['deskripsi'];
	if(move_uploaded_file($_FILES['gambar']['tmp_name'],$namagambar)==true){
	$sql="insert into detail_fasum values(null,trim('$id_fasum'),'$gambar',trim('$deskripsi'))"; // susun SQL
	$res=mysql_query($sql,$link); // Eksekusi SQL
	if($res){
		//Jika berhasil 
	?> 
		<div class="info">Data detail titik telah disimpan.</div> 
	<?php
	} 
	else{
		//Jika gagal
	?> 
		<div class="error">Terjadi kesalahan dalam penyimpanan data detail titik baru dengan kesalahan <b><?php echo mysql_error();?></b>. Silahkan diulang lagi.</div>
	<?php
	} 
	?>
    <a href="detail_lihat.php"><center>Kembali ke pengolahan data.</center></a>
   <?php
    }
 }
?>
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