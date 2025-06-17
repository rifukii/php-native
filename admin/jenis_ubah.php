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
  var jns=document.forms["form_ubah_jenis"]["jenis_fasum"].value;
  if (jns==null || jns=="") {
  alert("Jenis fasum harus diisi!");
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
            <h2 class="entry-title"><a href="#">Pengubahan Jenis Fasilitas Umum</a></h2><hr /> 
            <div class="entry-content">
                <p>
                <?php
	$id_jenis=$_REQUEST['id_jenis'];
	$link=koneksi_db();
	$sql="select f.*,k.nama_kategori from jenis_fasum f,kategori_fasum k where f.id_jenis='$id_jenis' and f.id_kategori=k.id_kategori";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method=post action="jenis_proses_ubah.php" name="form_ubah_jenis"  enctype="multipart/form-data">
		<fieldset>
        <legend>Pengubahan jenis fasilitas umum</legend>
        <table cellspacing="10px">
        <tr class="hide"><td>Nomor</td><td>
        <input class="hide" type=text name="id_jenis" value="<?php echo $data['id_jenis'];?>"size=31 maxlength=30 readonly></td></tr>
		<tr><td>Jenis Fasilitas umum</td><td>
        <input type=text name="jenis_fasum" value="<?php echo $data['jenis_fasum'];?>"size=31 maxlength=30></td></tr>
     	<tr><td>Kategori</td><td>
        <select name="id_kategori">
        	<option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
		<?php
		$sql="select * from kategori_fasum";
		$result=mysql_query($sql);
		while($data2=mysql_fetch_array($result)){
			if($data['id_kategori']<>$data2['id_kategori']){
			?>
				<option value="<?php echo $data2['id_kategori']; ?>"><?php echo $data2['nama_kategori']; ?></option>
			<?php	
			}
		}
		?>
        </select></td></tr>
        
        <tr><td>Keterangan</td><td>
        <textarea type="text" name="keterangan" cols="50" rows="5"><?php echo $data['keterangan'];?></textarea></td></tr>
        <tr><td>Icon</td><td>
        <img src="../icon/<?php echo $data['icon'];?>" width="20px" height="20px"><br><input type="file" name="icon" value="Ubah">
        </td></tr>
		<tr><td colspan="2"><div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasikategori()">
     <img src="../images/ya.png">Ubah</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
	</form>
    </div>
	<?php
	}
	else {
	?><div class="error">Data tidak ditemukan!</div>
	<a href="jenis_lihat.php"><center>Kembali ke pengolahan data.</center></a><?php
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