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
	$id_aturan_jumlah=$_POST['id_aturan_jumlah'];
	$id_jenis=$_POST['id_jenis'];
	$jml_minimal=$_POST['jml_minimal'];
	$link=koneksi_db();
	$sql="insert into aturan_jumlah values(trim('$id_aturan_jumlah'), trim('$id_jenis'), trim('$jml_minimal'))"; 
	$res=mysql_query($sql,$link); 
	if($res){
		 
	?> 
		<div class="info">Data peraturan telah disimpan</div> 
	<?php
	} 
	else{
		
	?> 
		<div class="error">Satu jenis fasilitas umum hanya boleh memiliki satu aturan jumlah</div>
	<?php
	} 
	?>
    <a href="aturanjml_lihat.php"><center>Kembali ke pengolahan data.</center></a>
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