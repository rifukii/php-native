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
  function validasidetail(){
  var fas=(form.id_fasum.value);
  if (fas=="0") {
  alert("Fasilitas umum belum dipilih!");
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
            <h2 class="entry-title"><a href="#">Penambahan Detail Fasilitas Umum</a></h2><hr /> 
            <div class="entry-content">
                <p>
                <?php $link=koneksi_db(); ?>
                <div align="center">
    <form method=post action="detail_proses_tambah.php" enctype="multipart/form-data" name="form">
 	 <fieldset>
     <legend>Tambah Detail Fasum</legend>
     <table cellspacing="10px">
     <tr class="hide"><td>ID Detail</td><td>
     <input type="text" name="id_detail" size=31 maxlength=30 class="hide"></td></tr>
     <tr><td>Fasilitas Umum</td><td>
     <select name="id_fasum">
		     <option value="0">Pilih fasum</option>
			 <?php
			 	$res=mysql_query("SELECT id_fasum,nama_fasum FROM fasum 
				                  ORDER BY nama_fasum");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_fasum']."\">".$data['nama_fasum']."
					      </option>";
				}
			 ?>
			 </select></td></tr>
     <tr><td>Gambar</td><td>
     <input type="file" name="gambar"></td></tr>
     <tr><td>Deskripsi</td><td>
     <textarea name="deskripsi" cols="50" rows="5"></textarea></td></tr>
     <tr><td colspan="2">
     <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasidetail()">
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