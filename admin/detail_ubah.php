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
    </script>   
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
            <h2 class="entry-title"><a href="#">Pengubahan Data Detail Titik</a></h2><hr /> 
            <div class="entry-content">
                <p>
                <?php
	$id_detail=$_REQUEST['id_detail'];
	$link=koneksi_db();
	$sql="select * from detail_fasum d, fasum f where d.id_detail='$id_detail' and d.id_fasum=f.id_fasum";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method=post action="detail_proses_ubah.php" enctype="multipart/form-data" name="form">
		<fieldset>
        <legend>Pengubahan data detail</legend>
        <table cellspacing="10px">
        <tr class="hide"><td>ID</td><td>
        <input class="hide" type=text name="id_detail" value="<?php echo $data['id_detail'];?>"size=31 maxlength=30 readonly></td></tr>
		<tr><td>Titik Fasilitas Umum</td><td>
        <select name="id_fasum">
        <option value="<?php echo $data['id_fasum']; ?>"><?php echo $data['nama_fasum']; ?></option>
		<?php
		$sql="select * from fasum";
		$result=mysql_query($sql);
		while($data2=mysql_fetch_array($result)){
			if($data['id_fasum']<>$data2['id_fasum']){
			?>
				<option value="<?php echo $data2['id_fasum']; ?>"><?php echo $data2['nama_fasum']; ?></option>
			<?php	
			}
		}
		?>
        </select>
        </td></tr>
        <tr><td>Gambar</td><td>
        <img src="../images/<?php echo $data['gambar'];?>" width="70px" height="70px">
        <br><input type="file" name="gambar" value="Ubah"></td></tr>
        <tr><td>Deskripsi</td><td>
        <textarea type="text" name="deskripsi" cols="50" rows="5"><?php echo $data['deskripsi'];?></textarea></td></tr>
        <tr><td colspan="2">
		<div class="buttons" align="center"><button type="submit" value="Simpan" class="positive">
     <img src="../images/ya.png">Ubah</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
	</form>
    </div>
	<?php
	}
	else {
	?><div class="error">Data tidak ditemukan!</div>
	<a href="fasum_lihat.php"><center>Kembali ke pengolahan data.</center></a><?php
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