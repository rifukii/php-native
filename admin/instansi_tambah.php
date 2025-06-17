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
  function validasiinstansi(){
  var id=document.forms["form_tambah_instansi"]["id_instansi"].value;
  var ins=document.forms["form_tambah_instansi"]["nama_instansi"].value;
  var singkat=document.forms["form_tambah_instansi"]["singkatan"].value;
  if (id==null || id=="") {
  alert("ID instansi harus diisi!");
  return false;
  } else if (ins==null || ins=="") {
  alert("Nama instansi harus diisi!");
  return false;
  } else if (singkat==null || singkat=="") {
  alert("Singkatan harus diisi! Isi dengan nama instansi jika instansi yang bersangkutan tidak punya singkatan.");
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
            <h2 class="entry-title"><a href="#">Penambahan Data Instansi</a></h2><hr />
            <div class="entry-content">
            <div align="center">
<form method="post" action="instansi_proses_tambah.php" name="form_tambah_instansi">
  <fieldset>
  <legend>Penambahan Instansi Baru</legend>
     <table cellspacing="10px">
     <tr><td>ID Instansi</td><td>
     <input type=text name="id_instansi" size=2 maxlength=2>
</td></tr>
     <tr><td>Nama</td><td>
     <input type=text name="nama_instansi" size=51 maxlength=50></td></tr>
     <tr><td>Singkatan</td><td>
     <input type=text name="singkatan" size=51 maxlength=50></td></tr>
     <tr><td colspan="2">
     <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasiinstansi()">
     <img src="../images/ya.png">Simpan</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
</form>
</div>
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