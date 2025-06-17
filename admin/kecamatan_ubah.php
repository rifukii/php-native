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
<script language="javascript">
function validasikecamatan(){
  var id=document.forms["form_ubah_kecamatan"]["id_kecamatan"].value;
  var kec=document.forms["form_ubah_kecamatan"]["nama_kecamatan"].value;
  if (id==null || id=="") {
  alert("ID kecamatan harus diisi!");
  return false;
  } else if (kec==null || kec=="") {
  alert("Nama kecamatan harus diisi!");
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
            <h2 class="entry-title"><a href="#">Pengubahan Kecamatan</a></h2><hr />
            <div class="entry-content">
               <?php
	$id_kecamatan=$_REQUEST['id_kecamatan'];
	$link=koneksi_db();
	$sql="select * from kecamatan where id_kecamatan='$id_kecamatan'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method="post" action="kecamatan_proses_ubah.php" name="form_ubah_kecamatan">
		<fieldset>
        <legend>Pengubahan Data Kecamatan</legend>
        <table align="center" cellspacing="10px">
        <tr><td>ID</td><td>
        <input type=text name="id_kecamatan" value="<?php echo $data['id_kecamatan'];?>" size="8" maxlength="8" pattern="32.11.\d{1,2}" title="Format: 32.11.xx"></td></tr>
        <tr><td>Nama Kecamatan</td><td>
        <input type=text name="nama_kecamatan" value="<?php echo $data['nama_kecamatan'];?>" size=51 maxlength=50></td></tr>
        <tr><td colspan="2">
		    <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasikecamatan()">
     <img src="../images/ya.png">Ubah</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
	</form>
    </div>
	<?php
	}
	else {
	?><div class="error">Data tidak ditemukan!</div>
	<a href="kecamatan_lihat.php"><center>Kembali ke pengolahan data.</center></a><?php
	}
	?>
	</article>
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