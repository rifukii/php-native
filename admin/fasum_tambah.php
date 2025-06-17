<?php 
	session_start();
	if(isset($_SESSION['sudahlogin']))
	{
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php 
	include("lib_func.php");
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link rel="Icon" href="../images/icon.ico">
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function validasifasum(){
  var nama=document.forms["form_tambah_fasum"]["nama_fasum"].value;
  var jns=(form_tambah_fasum.id_jenis.value);
  var kec=(form_tambah_fasum.id_kecamatan.value);
  var ins=(form_tambah_fasum.id_instansi.value);
  if (nama==null || nama==""){
  alert("Nama fasum harus diisi!");
  return false;
  } else if (jns=="0") {
  alert("Jenis fasilitas umum belum dipilih!");
  return false;
  } else if (kec=="0") {
  alert("Kecamatan belum dipilih!");
  return false;
  } else if(ins=="0") {
  alert("Instansi belum dipilih!");
  return false;
  }
  return true;
}

</script>
</head>
<body onLoad="initialize()">
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
            <h2 class="entry-title"><a href="#">Penambahan Data Fasilitas Umum</a></h2><hr />
            <div class="entry-content">
                <?php $link=koneksi_db(); ?>
                <div align="center">
    <form method=post action="fasum_tambah2.php" name="form_tambah_fasum">
    <fieldset>
    <legend>Penambahan Data Fasilitas Umum</legend>
 	 
     <table align="center" bgcolor="white" border="0" cellspacing="10px">
     <tr><td>Nama</td><td><input type="text" name="nama_fasum" size=31 maxlength=30></td></tr>
     <tr><td>Jenis Fasum</td><td>
     <select name="id_jenis" >
     <option value="0">Pilih jenis fasilitas umum</option>
		     <?php
			 	$res=mysql_query("SELECT * FROM jenis_fasum ORDER BY jenis_fasum");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_jenis']."\">".$data['jenis_fasum']."
					      </option>";
				}
			 ?>
			 </select>
     </td></tr>
     <tr><td>Kondisi</td><td>
     <select name="kondisi">
		     <option value="Belum diisi">Pilih</option>
             <option value="Baik">Baik</option>
             <option value="Rusak Ringan">Rusak Ringan</option>
             <option value="Rusak Berat">Rusak Berat</option>
		 	 </select>
     </td></tr>
     <tr><td>Alamat</td><td><textarea name="alamat" cols="50" rows="5"></textarea></td></tr>
     <tr><td>Kecamatan</td><td>
     <select name="id_kecamatan">
     <option value="0">Pilih kecamatan</option>
		     <?php
			 	$res=mysql_query("SELECT id_kecamatan,nama_kecamatan FROM kecamatan ORDER BY nama_kecamatan");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_kecamatan']."\">".$data['nama_kecamatan']."
					      </option>";
				}
			 ?>
			 </select>
     </td></tr>
     <tr><td>Instansi</td><td>
     <select name="id_instansi">
     <option value="0">Pilih instansi</option>
		     <?php
			 	$res=mysql_query("SELECT id_instansi,singkatan FROM instansi 
				                  ORDER BY singkatan");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_instansi']."\">".$data['singkatan']."
					      </option>";
				}
			 ?>
			 </select>
     </td></tr>
     <tr class="hide"><td>Penginput</td><td><input type=text name="username" value="<?php echo $_SESSION['username'];?>" readonly></td></tr>
     <!--/MAP/------------------------------------>       
     <tr><td colspan="2"><div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasifasum()">
     <img src="../images/ya.png">Tentukan koordinat</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr>
  </table> </fieldset>
</form></div>

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