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
            <h2 class="entry-title"><a href="#">Pengolahan Jenis Fasilitas Umum</a></h2><hr /> 
            <div class="entry-content">
                <p>
                <?php
				$link=koneksi_db();
				$sql="select j.*,k.* from jenis_fasum j JOIN kategori_fasum k WHERE j.id_kategori=k.id_kategori "; 
				if(isset($_POST['tblcari']))
				{
				$fieldcari=$_POST['fieldcari'];
				$keyword=$_POST['keyword'];
				$sql=$sql." and $fieldcari like '%$keyword%'";
				}
				$sql.="order by id_jenis"; 
				$res=mysql_query($sql,$link); 
				$banyakrecord=mysql_num_rows($res); 
				if($banyakrecord>0){ 
				?> 
                <div align="center">
                <form class="pencarian" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                Pencarian
				<?php 
				$fieldcari="";
				if(isset($_POST['fieldcari']))
				$fieldcari=$_POST['fieldcari'];
				?>
                <select name="fieldcari">
                <option value="id_jenis" <?php if($fieldcari=="id_jenis") echo "selected";?>>ID Jenis</option>
                <option value="jenis_fasum" <?php if($fieldcari=="jenis_fasum") echo "selected";?>>Jenis Fasum</option>
                </select> 
                <input type="text" name="keyword" size=30 maxlength="30" 
                value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword'];?>">
                <button type="submit" class="positive" name="tblcari">Cari</button><a href="jenis_tambah.php"><button type="button" class="positive">Tambah</button></a>
                </form></div>
                <div class="info">Data ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
     
		<div align="center">
        <table class="tabel">
		  <thead>
          <th scope="col">ID</th>
          <th scope="col">JENIS FASILITAS UMUM</th>
          <th scope="col">KATEGORI</th>
          <th scope="col">KETERANGAN</th>
          <th scope="col">ICON</th>
          <th scope="col" colspan="2">AKSI</th>
          </thead>
		  <tbody>
		  <?php
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<tr>
		  	   <td><?php echo $data['id_jenis'];?></td>
		  	   <td><?php echo $data['jenis_fasum'];?></td> 
		  	   <td><?php echo $data['nama_kategori'];?></td>
               <td><?php echo $data['keterangan'];?></td>
               <td><img src="../icon/<?php echo $data['icon'];?>" width="20px" height="20px"></td>
               <td><a href="jenis_ubah.php?id_jenis=<?php echo $data['id_jenis'];?>"><img src="../images/edit.png" border="0"></a></td>
               <td><a href="jenis_proses_hapus.php?id_jenis=<?php echo $data['id_jenis'];?>" onClick="return hapusjenis();"><img src="../images/delete.png" border="0"></a></td>
		  	</tr>
          <script type="text/javascript">
			function hapusjenis() {
			return confirm('Anda yakin akan menghapus jenis fasilitas umum ini?');
			}
		  </script>
		  <?php
		  	} 
		  ?> 
		</tbody>
        </table></div>
	<?php
	}
	else{ 
	?> 
	<div class="error">Data tidak ditemukan!</div>
    <a href="jenis_tambah.php"><center>Klik di sini untuk menambah data.</center></a>
	<?php
	} 
	?>
    
                </p>
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