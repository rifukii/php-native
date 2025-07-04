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
            <h2 class="entry-title"><a href="#">Pengolahan Data Fasilitas Umum</a></h2><hr />
            <div class="entry-content">
                <?php
				$link=koneksi_db();
				$sql="select f.*,j.*,ka.*,ke.*,i.* from fasum f, jenis_fasum j, kategori_fasum ka, kecamatan ke, instansi i WHERE f.id_jenis=j.id_jenis AND j.id_kategori=ka.id_kategori AND f.id_instansi=i.id_instansi AND f.id_kecamatan=ke.id_kecamatan "; 
				if(isset($_POST['tblcari']))
				{
				$fieldcari=$_POST['fieldcari'];
				$keyword=$_POST['keyword'];
				$sql=$sql." AND $fieldcari like '%$keyword%'";
				}
				$sql.="order by id_fasum";
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
                <option value="id_fasum" <?php if($fieldcari=="id_fasum") echo "selected";?>>ID Fasilitas</option>
                <option value="nama_fasum" <?php if($fieldcari=="nama_fasum") echo "selected";?>>Nama Fasilitas</option>
                </select> 
                <input type="text" name="keyword" size=30 maxlength="30" 
                value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword'];?>">
               <button type="submit" class="positive" name="tblcari">Cari</button><a href="fasum_tambah.php"><button type="button" class="positive">Tambah</button></a></form></div>
                    <div class="info">Data ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
        
		<div align="center"><table class="tabel">
        <thead>
        <th col="col">ID</th>
        <th col="col">NAMA</th>
        <th col="col">JENIS</th>
        <th col="col">KATEGORI</th>
        <th col="col">KONDISI</th>
        <th col="col">ALAMAT</th>
        <th col="col">KECAMATAN</th>
        <th col="col">INSTANSI</th>
        <th col="col" class="hide">PENGINPUT</th>
        <th col="col">KOORDINAT</th>
        <th col="col" colspan="2">AKSI</th>
        </thead>
        <tbody>
		  <?php
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<tr>
		  	   <td><?php echo $data['id_fasum'];?></td>
		  	   <td><?php echo $data['nama_fasum'];?></td> 
		  	   <td><?php echo $data['jenis_fasum'];?></td>
               <td><?php echo $data['nama_kategori'];?></td>
               <td><?php echo $data['kondisi'];?></td>
               <td><?php echo $data['alamat'];?></td>
               <td><?php echo $data['nama_kecamatan'];?></td>
               <td><?php echo $data['singkatan'];?></td>
               <td class="hide"><?php echo $data['username'];?></td>
               <td><?php echo $data['lat'];?>, <?php echo $data['lng'];?></td> 
			   <td><a href="fasum_ubah.php?id_fasum=<?php echo $data['id_fasum'];?>"><img src="../images/edit.png" border="0"></a></td>
               <td><a href="fasum_proses_hapus.php?id_fasum=<?php echo $data['id_fasum'];?>" onClick="return hapusfasum();"><img src="../images/delete.png" border="0"></a></td>
		  	</tr>
		  <script type="text/javascript">
			function hapusfasum() {
			return confirm('Anda yakin akan menghapus fasilitas umum ini?');
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
    <a href="fasum_tambah.php"><center>Klik di sini untuk menambah data.</center></a>
	<?php
	} 
	?>
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