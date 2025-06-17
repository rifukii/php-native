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
            <h2 class="entry-title"><a href="#">Penambahan Data Peraturan</a></h2><hr />
            <div class="entry-content">
    <?php
	$id_aturan_jarak=$_POST['id_aturan_jarak'];
	$id_jenis=$_POST['id_jenis'];
	$id_jenis2=$_POST['id_jenis2'];
	$meter=$_POST['meter'];
	$link=koneksi_db();
	$sql="insert into aturan_jarak values(trim('$id_aturan_jarak'), trim('$id_jenis'), trim('$id_jenis2'), trim('$meter'))"; 
	$res=mysql_query($sql,$link); 
	if($res){
		 
	?> 
		<div class="info">Data peraturan telah disimpan</div> 
	<?php
	} 
	else{
		
	?> 
		<div class="error">Aturan untuk jenis fasum ini sudah ada!</div>
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