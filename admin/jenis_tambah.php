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
  function validasikategori(){
  var jns=document.forms["form_tambah_jenis"]["jenis_fasum"].value;
  var kat=(form_tambah_jenis.id_kategori.value);
  if (jns==null || jns=="") {
  alert("Jenis fasum harus diisi!");
  return false;
  } else if (kat=="0"){
  alert("Kategori fasilitas umum belum dipilih!");
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
            <h2 class="entry-title"><a href="#">Penambahan Jenis Fasilitas Umum</a></h2><hr /> 
            <div class="entry-content">
                <p>
                <?php $link=koneksi_db(); ?>
                <div align="center">
    <form method=post action="jenis_proses_tambah.php" name="form_tambah_jenis" enctype="multipart/form-data">
 	 <fieldset>
     <legend>Tambah Jenis Fasilitas Umum Baru</legend>
     <table cellspacing="10px">
     <tr><td>Jenis Fasum</td><td><input type="text" name="jenis_fasum" size=31 maxlength=30></td></tr>
     <tr><td>Kategori</td><td>
     <select name="id_kategori">
     <option value="0">Pilih kategori</option>
		     <?php
			 	$res=mysql_query("SELECT id_kategori,nama_kategori FROM kategori_fasum 
				                  ORDER BY nama_kategori");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_kategori']."\">".$data['nama_kategori']."
					      </option>";
				}
			 ?>
			 </select></td></tr>
    <tr><td>Keterangan</td><td>
     <textarea name="keterangan" cols="50" rows="5"></textarea></td></tr>
     <tr><td>Icon</td><td>
     <input type="file" name="icon"></td></tr>
     <tr><td colspan="2">
     <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasikategori()">
     <img src="../images/ya.png">Simpan</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
</form>
</div>
                </p>
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