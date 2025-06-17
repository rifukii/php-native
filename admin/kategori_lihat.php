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
            <h2 class="entry-title"><a href="#">Pengolahan Data Kategori</a></h2><hr /> 
            <div class="entry-content">
                <?php
	$link=koneksi_db();
	$sql="select * from kategori_fasum "; 
	if(isset($_POST['tblcari']))
	{
	$fieldcari=$_POST['fieldcari'];
	$keyword=$_POST['keyword'];
	$sql=$sql." where $fieldcari like '%$keyword%'";
	}
	$sql.="order by id_kategori"; 
	$res=mysql_query($sql,$link); 
	$banyakrecord=mysql_num_rows($res); 
	if($banyakrecord>0){ 
	?> 
    <div align="center" class="pencarian">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                Pencarian
				<?php 
				$fieldcari="";
				if(isset($_POST['fieldcari']))
				$fieldcari=$_POST['fieldcari'];
				?>
                <select name="fieldcari">
                <option value="id_kategori" <?php if($fieldcari=="id_kategori") echo "selected";?>>ID Kategori</option>
                <option value="nama_kategori" <?php if($fieldcari=="nama_kategori") echo "selected";?>>Nama Kategori</option>
                </select> 
                <input type="text" name="keyword" size=30 maxlength="30" 
                value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword'];?>">
                <button type="submit" class="positive" name="tblcari">Cari</button><a href="kategori_tambah.php"><button type="button" class="positive">Tambah</button></a></div>
		<div class="info">Data ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
		<div align="center">
        <table class="tabel">
		  <thead>
          <th col="col">ID</th>
          <th col="col">NAMA KATEGORI</th>
          <th col="col" colspan="2">AKSI</th>
          </thead>
          <tbody>
		  <?php
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<tr>
		  	   <td><?php echo $data['id_kategori'];?></td>
		  	   <td><?php echo $data['nama_kategori'];?></td> 
		  	   <td><a href="kategori_ubah.php?id_kategori=<?php echo $data['id_kategori'];?>"><img src="../images/edit.png" border="0"></a></td>
               <td><a href="kategori_proses_hapus.php?id_kategori=<?php echo $data['id_kategori'];?>" onClick="return hapuskategori();"><img src="../images/delete.png" border="0"></a></td>
		  	</tr>
		  <script type="text/javascript">
			function hapuskategori() {
			return confirm('Anda yakin akan menghapus kategori ini?');
			}
		  </script>
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
    <a href="kategori_tambah.php"><center>Klik di sini untuk menambah data.</center></a>
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