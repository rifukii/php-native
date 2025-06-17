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
            <h2 class="entry-title"><a href="#">Pengubahan Jenis Fasilitas Umum</a></h2><hr />
            <div class="entry-content">
<?php
	if($_FILES['icon']['error']==0){
	$link=koneksi_db();
	$id_jenis=$_POST['id_jenis'];
	$jenis_fasum=$_POST['jenis_fasum'];
	$id_kategori=$_POST['id_kategori'];
	$keterangan=$_POST['keterangan'];
	$icon=$_FILES['icon']['name'];
	$namaicon="../icon/".$icon;
	if(move_uploaded_file($_FILES['icon']['tmp_name'],$namaicon)==true){
	$sql="update jenis_fasum set jenis_fasum='$jenis_fasum', id_kategori='$id_kategori', keterangan='$keterangan', icon='$icon' where id_jenis='$id_jenis'";
	$res=mysql_query($sql);
	if($res){
	?>
		<div class="info">Jenis fasilitas umum <b><?php echo $jenis_fasum;?></b> telah diubah.</div>
		<?php
	}
	else {
	?>
		<div class="error">Jenis fasilitas umum <?php echo $jenis_fasum;?> gagal diubah dengan pesan kesalahan <b>
		<?php echo mysql_error();?></b>.</div>
	<?php
	}
?> 
<a href="jenis_lihat.php"><center>Kembali ke pengolahan data.</center></a>	
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