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
<script>
  function validasikategori(){
  var kat=document.forms["form_ubah_kategori"]["nama_kategori"].value;
  if (kat==null || kat=="") {
  alert("Nama kategori harus diisi!");
  return false;
  } 
  return true;
}
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
            <h2 class="entry-title"><a href="#">Pengubahan Data Kategori</a></h2><hr />
            <div class="entry-content">
                <?php
	$id_kategori=$_REQUEST['id_kategori'];
	$link=koneksi_db();
	$sql="select * from kategori_fasum where id_kategori='$id_kategori'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method="post" action="kategori_proses_ubah.php" name="form_ubah_kategori">
		<fieldset>
        <legend>Pengubahan Data kategori</legend>
        <table align="center" cellspacing="10px">
        <tr class="hide"><td>ID Kategori</td></tr>
        <input class="hide" type=text name="id_kategori" value="<?php echo $data['id_kategori'];?>" readonly>
        <tr><td>Nama Kategori</td><td>
        <input type=text name="nama_kategori" value="<?php echo $data['nama_kategori'];?>" size=51 maxlength=50></td></tr>
        <tr><td colspan="2">
        <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasikategori()">
     <img src="../images/ya.png">Ubah</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
	</form>
    </div>
	<?php
	}
	else {
	?><div class="error">Data tidak ditemukan!</div>
	<a href="kategori_lihat.php"><center>Kembali ke pengolahan data.</center></a><?php
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