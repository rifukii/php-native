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
            <h2 class="entry-title"><a href="#">Pengolahan Data Detail Titik</a></h2><hr /> 
            <div class="entry-content">
                <p>
                <?php
				$link=koneksi_db();
				$sql="select d.*,f.nama_fasum from detail_fasum d, fasum f where d.id_fasum=f.id_fasum "; 
				if(isset($_POST['tblcari']))
				{
				$fieldcari=$_POST['fieldcari'];
				$keyword=$_POST['keyword'];
				$sql=$sql." AND $fieldcari like '%$keyword%'";
				}
				$sql.="order by id_detail"; 
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
                <option value="id_detail" <?php if($fieldcari=="id_detail") echo "selected";?>>ID Detail</option>
                <option value="nama_fasum" <?php if($fieldcari=="nama_fasum") echo "selected";?>>Nama Fasum</option>
                </select> 
                <input type="text" name="keyword" size=30 maxlength="30" 
                value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword'];?>">
                <button type="submit" class="positive" name="tblcari">Cari</button><a href="detail_tambah.php"><button type="button" class="positive">Tambah</button></a>
                </form></div>
                <div class="info">Data ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
        
		<div align="center">
        <table class="tabel">
        <thead>
        <th col="col">ID DETAIL</th>
        <th col="col">FASILITAS UMUM</th>
        <th col="col">GAMBAR</th>
        <th col="col">DESKRIPSI</th>
        <th col="col" colspan="2">AKSI</th>
        <thead>
        <tbody>
		  <?php
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<tr>
		  	   <td><?php echo $data['id_detail'];?></td>
		  	   <td><?php echo $data['nama_fasum'];?></td> 
		  	   <td><img src="../images/<?php echo $data['gambar'];?>" width="70px" height="70px"></td>
               <td><?php echo $data['deskripsi'];?></td>
               <td align="center"><a href="detail_ubah.php?id_detail=<?php echo $data['id_detail'];?>"><img src="../images/edit.png" border="0"></a></td>
               <td align="center"><a href="detail_proses_hapus.php?id_detail=<?php echo $data['id_detail'];?>" onClick="return hapusdetail();"><img src="../images/delete.png" border="0"></a></td>
		  	</tr>
		  <script type="text/javascript">
			function hapusdetail() {
			return confirm('Anda yakin akan menghapus detail fasilitas umum ini?');
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
    <a href="detail_tambah.php"><center>Klik di sini untuk menambah data.</center></a>
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