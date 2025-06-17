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
            <h2 class="entry-title"><a href="#">Pengolahan Aturan Jumlah Fasilitas Umum</a></h2><hr />
            <div class="entry-content">
                <?php
	$link=koneksi_db();
	$sql="select a.*,j.id_jenis,j.jenis_fasum from aturan_jumlah a,jenis_fasum j where a.id_jenis=j.id_jenis";
	if(isset($_POST['tblcari']))
				{
				$fieldcari=$_POST['fieldcari'];
				$keyword=$_POST['keyword'];
				$sql=$sql." and $fieldcari like '%$keyword%' ";
				}
				$sql.=" order by id_aturan_jumlah"; 
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
                <option value="id_aturan_jumlah" <?php if($fieldcari=="id_aturan_jumlah") echo "selected";?>>ID Peraturan</option>
                <option value="jenis_fasum" <?php if($fieldcari=="jenis_fasum") echo "selected";?>>Jenis Fasum</option>
                </select> 
                <input type="text" name="keyword" size=30 maxlength="30" 
                value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword'];?>">
                <button type="submit" class="positive" name="tblcari">Cari</button><a href="aturanjml_tambah.php"><button type="button" class="positive">Tambah</button></a>
                </form></div>
    <div class="info">Data ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
		<div align="center">
        <table class="tabel">
		  <thead>
          <th col="col">ID</th>
          <th col="col">JENIS FASUM</th>
          <th col="col">JUMLAH MINIMAL</th>
          <th col="col" colspan="2">AKSI</th>
		  </thead>
          <tbody>
		  <?php
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<tr>
		  	   <td><?php echo $data['id_aturan_jumlah'];?></td>
		  	   <td><?php echo $data['jenis_fasum'];?></td>
               <td><?php echo $data['jml_minimal'];?></td> 
		  	   <td><a href="aturanjml_ubah.php?id_aturan_jumlah=<?php echo $data['id_aturan_jumlah'];?>"><img src="../images/edit.png" border="0"></a></td>
               <td><a href="aturanjml_proses_hapus.php?id_aturan_jumlah=<?php echo $data['id_aturan_jumlah'];?>" onClick="return hapusaturan();"><img src="../images/delete.png" border="0"></a>
		  	</tr>
		  <script type="text/javascript">
			function hapusaturan() {
			return confirm('Anda yakin akan menghapus aturan ini?');
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
	<a href="aturanjml_tambah.php"><center>Klik di sini untuk menambah data.</center></a>
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