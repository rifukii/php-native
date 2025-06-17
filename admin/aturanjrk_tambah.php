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
  function validasijarak(){
  var jrk=document.forms["form_tambah_jarak"]["meter"].value;
  var jns=(form_tambah_jarak.id_jenis.value);
  var jns2=(form_tambah_jarak.id_jenis2.value);
  if (jns=="0" || jns2=="0" ){
  alert("Jenis fasilitas umum belum dipilih!");
  return false;
  } else if (jrk==null || jrk=="") {
  alert("Jarak harus diisi!");
  return false;
  } else if (jrk<0) {
  alert("Jarak tidak boleh kurang dari 0!");
  return false;
  }else if (isNaN(jrk)) {
  alert("Input hanya boleh berupa angka!");
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
            <h2 class="entry-title"><a href="#">Penambahan Aturan Jarak Fasilitas Umum</a></h2>       <hr />
            <div class="entry-content">
    <div align="center">
	<form method="post" action="aturanjrk_proses_tambah.php" name="form_tambah_jarak">
		<fieldset>
        <table cellspacing="10px"><legend>Penambahan Aturan Jarak Fasilitas Umum</legend>
        <tr><td class="hide">ID</td><td>
        <input type=text name="id_aturan_jarak" class="hide"></td></tr>
        <tr><td>Jenis Fasum Yang Diatur</td><td>
        <select name="id_jenis">
     <option value="0">Pilih Jenis Fasum</option>
		     <?php
			 	$link=koneksi_db();
				$res=mysql_query("SELECT id_jenis,jenis_fasum FROM jenis_fasum ORDER BY jenis_fasum");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_jenis']."\">".$data['jenis_fasum']."
					      </option>";
				}
			 ?>
			 </select></td></tr>
             <tr><td>Jenis Fasum Pembanding</td><td>
        <select name="id_jenis2">
     <option value="0">Pilih Jenis Fasum</option>
		     <?php
			 	$link=koneksi_db();
				$res=mysql_query("SELECT id_jenis,jenis_fasum FROM jenis_fasum ORDER BY jenis_fasum");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_jenis']."\">".$data['jenis_fasum']."
					      </option>";
				}
			 ?>
			 </select></td></tr>
        <tr><td>Jarak Minimal (meter)</td><td>
        <input type=text name="meter" size=51 maxlength=50></td></tr>
        <tr><td colspan="2">
        <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasijarak()">
     <img src="../images/ya.png">Simpan</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div>
</td></tr></table>
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