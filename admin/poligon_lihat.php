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
            <h2 class="entry-title"><a href="#">Pengolahan Data Poligon</a></h2><hr />
            <div class="entry-content">
                <?php
	$link=koneksi_db();
	$sql="select * from poligon order by id_poligon"; 
	$res=mysql_query($sql,$link); 
	$banyakrecord=mysql_num_rows($res); 
	if($banyakrecord>0){ 
	?> 
		<div align="center">
        <table class="tabel">
		  <thead>
          <th col="col">ID</th>
          <th col="col">POLIGON</th>
          <th col="col">URL</th>
          <th col="col">PENGELOLA</th>
          <th col="col">AKSI</th>
		  </thead>
          <tbody>
		  <?php
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<tr>
		  	   <td><?php echo $data['id_poligon'];?></td>
		  	   <td><?php echo $data['nama_poligon'];?></td>
               <td><?php echo $data['url'];?></td> 
               <td><?php echo $data['username'];?></td> 
		  	   <td><a href="poligon_ubah.php?id_poligon=<?php echo $data['id_poligon'];?>"><img src="../images/edit.png" border="0"></a></td>
		  	</tr>
		  <?php
		  	} 
		  ?> 
        </tbody> 
		</table>
        </div>
	<?php
	}
	else{ 
	?> 
	<div class="error">Data tidak ditemukan!</div>
    <a href="poligon_tambah.php"><center>Klik di sini untuk menambah data.</center></a>
	<?php
	} 
	?>
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