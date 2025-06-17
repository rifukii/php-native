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
            <h2 class="entry-title"><a href="#">Pengolahan Data Komentar</a></h2><hr />
            <div class="entry-content">
                <?php
	$link=koneksi_db();
	$sql="select * from komentar ";
	if(isset($_POST['tblcari']))
	{
	$fieldcari=$_POST['fieldcari'];
	$keyword=$_POST['keyword'];
	$sql=$sql." where $fieldcari like '%$keyword%'";
	}
	$sql.="order by id_komentar"; 
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
                <option value="id_komentar" <?php if($fieldcari=="id_komentar") echo "selected";?>>ID Komentar</option>
                <option value="nama" <?php if($fieldcari=="nama") echo "selected";?>>Nama</option>
                </select> 
                <input type="text" name="keyword" size=30 maxlength="30" 
                value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword'];?>">
                <button type="submit" class="positive" name="tblcari">Cari</button></form></div>
		<div class="info">Data ditemukan sebanyak: <b><?php echo $banyakrecord;?></b> Record</div>
		<div align="center">
        <table class="tabel">
        <thead>
        <th col="col">ID</th>
        <th col="col">PERIHAL</th>
        <th col="col">WAKTU</th>
        <th col="col">NAMA</th>
        <th col="col">KOMENTAR</th>
        <th col="col">EMAIL</th>
        <th col="col">TAMPIL</th>
        <th col="col">PENGELOLA</th>
        <th col="col" colspan="2">AKSI</th>
        </thead>
        <tbody>
          <?php
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<tr>
		  	   <td><?php echo $data['id_komentar'];?></td>
		  	   <td><?php echo $data['perihal'];?></td>
               <td><?php echo $data['waktu'];?></td> 
               <td><?php echo $data['nama'];?></td> 
               <td><?php echo $data['komentar'];?></td> 
               <td><?php echo $data['email'];?></td> 
               <td><?php echo $data['tampil'];?></td> 
               <td><?php echo $data['username'];?></td> 
		  	   <td align="center"><a href="komentar_setujui.php?id_komentar=<?php echo $data['id_komentar'];?>"><img src="../images/confirm.png" border="0"></a></td>
               <td align="center"><a href="komentar_proses_hapus.php?id_komentar=<?php echo $data['id_komentar'];?>" onClick="return hapuskomentar();"><img src="../images/delete.png" border="0"></a></td>
		  	</tr>
		  <script type="text/javascript">
			function hapuskomentar() {
			return confirm('Anda yakin akan menghapus komentar ini?');
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
	<div class="error">Data komentar tidak ditemukan!</div>
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