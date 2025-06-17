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
  function validasipoligon(){
  var nama=document.forms["form_ubah_poligon"]["nama_poligon"].value;
  var url=document.forms["form_ubah_poligon"]["url"].value;
  if (nama==null || nama=="") {
  alert("Nama poligon harus diisi!");
  return false;
  } else if (url==null || url=="") {
  alert("URL harus diisi!");
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
            <h2 class="entry-title"><a href="#">Pengubahan Data Poligon</a></h2>       <hr />
            <div class="entry-content">
                <?php
	$id_poligon=$_REQUEST['id_poligon'];
	$link=koneksi_db();
	$sql="select * from poligon where id_poligon='$id_poligon'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method="post" action="poligon_proses_ubah.php" name="form_ubah_poligon">
		<fieldset>
        <legend>Pengubahan Data Poligon</legend>
        <table cellspacing="10px">
        <tr class="hide"><td>ID</td><td>
        <input class="hide" type=text name="id_poligon" value="<?php echo $data['id_poligon'];?>"></td></tr>
        <tr><td>Poligon</td><td>
        <input type=text name="nama_poligon" value="<?php echo $data['nama_poligon'];?>" size=51 maxlength=50></td></tr>
        <tr><td>URL</td><td>
        <input type=text name="url" value="<?php echo $data['url'];?>" size=71 maxlength=70></td></tr>
        <tr class="hide"><td>Penginput</td><td>
        <input class="hide" type=text name="username" value="<?php echo $_SESSION['username'];?>" readonly></td></tr>
        <tr><td colspan="2">
        <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasipoligon()">
     <img src="../images/ya.png">Ubah</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
	</form>
    </div>
	<?php
	}
	else {
	?><div class="warning">Data tidak ditemukan!</div>
	<a href="poligon_lihat.php"><center>Kembali ke pengolahan data.</center></a>
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